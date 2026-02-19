<?php

use app\handlers\{
    app\AppDetails,
    errors\NotFoundHandler,
    mailer\Mailer
};

use app\handlers\auth\{
    jwt\JwtAuth,
    jwt\JwtClaims,
    jwt\JwtFactory,
    jwt\Parser
};

use app\handlers\notifier\{
    Slack as SlackNotifier,
    Twilio as TwilioNotifier
};

use app\listeners\endpoint\{
    Slack_DownNotification,
    Slack_UpNotification,
    SMS_DownNotification,
    SMS_UpNotification
};

use app\providers\{
    auth\EloquentProvider,
    jwt\FirebaseProvider
};

use app\validations\{
    contracts\ValidatorInterface,
    Validator
};

use app\views\{
    extensions\GetEnvExtension,
    extensions\GetYamlExtension,
    extensions\TranslationExtension,
    Factory
};

use Cartalyst\Sentinel\Native\Facades\Sentinel;

use GuzzleHttp\Client as HttpClient;

use Illuminate\{
    Filesystem\Filesystem,
    Translation\FileLoader,
    Translation\Translator
};

use Intervention\Image\ImageManager;

use Noodlehaus\Config;

use Psr\Container\{ContainerInterface};

use Slim\{
    Csrf\Guard,
    Flash\Messages,
    Router,
    Views\Twig,
    Views\TwigExtension
};

use Symfony\Component\EventDispatcher\EventDispatcher;

use Twig\Extra\Intl\IntlExtension;

use Twilio\Rest\Client as Twilio;

use function DI\get;

/**
 * attaching : TO CONTAINER ->
 */
return [

    /* 404 ERROR */
    'notFoundHandler' => function(ContainerInterface $container) {

        return new NotFoundHandler ($container->get(Twig::class));
    },

    /* APP -> CONFIGS */
    Config::class => function() {

        switch ($_ENV["APP_MODE"]) {

            case 'development':
                return new Config(
                    __DIR__ . '/../config/development'
                );

            case 'production':
                return new Config(
                    __DIR__ . '/../config/production'
                );

            default:
                return new Config(
                    __DIR__ . '/../config/_examples'
                );
        }
    },

    /* AUTH -> JWT */
    JwtAuth::class => function (ContainerInterface $container) {

        $authProvider = new EloquentProvider();
        $claimsFactory = new JwtClaims(

            $container->get(ContainerInterface::class),
            $container->get('request')
        );

        $jwtProvider = new FirebaseProvider($container->get(ContainerInterface::class));

        $factory = new JwtFactory($claimsFactory, $jwtProvider);

        $parser = new Parser($jwtProvider);

        return new JwtAuth($authProvider, $factory, $parser);
    },

    /* CSRF */
    Guard::class => function () {

        $guard = new Guard();
        $guard->setPersistentTokenMode(true);

        return $guard;
    },

    /* Endpoint Monitor -> Symfony EventDispatcher */
    EventDispatcher::class => function (ContainerInterface $container) {

        $dispatcher = new Symfony\Component\EventDispatcher\EventDispatcher();

        $SlackNotificationsIsEnabled = $container->get(Config::class)->get('el.endpoint.notify.slack');
        $SmsNotificationsIsEnabled = $container->get(Config::class)->get('el.endpoint.notify.sms');

        if ($SlackNotificationsIsEnabled) {

            $dispatcher->addListener('endpoint.down', [new Slack_DownNotification($container->get(SlackNotifier::class)), 'handle']);

            $dispatcher->addListener('endpoint.up', [new Slack_UpNotification($container->get(SlackNotifier::class)), 'handle']);

        }

        if ($SmsNotificationsIsEnabled) {

            $dispatcher->addListener('endpoint.down', [new SMS_DownNotification($container->get(TwilioNotifier::class)), 'handle']);

            $dispatcher->addListener('endpoint.up', [new SMS_UpNotification($container->get(TwilioNotifier::class)), 'handle']);

        }

        return $dispatcher;
    },

    /* Endpoint Monitor -> TWILIO */
    Twilio::class => function (ContainerInterface $container) {

        $config = $container->get(Config::class)->get('service.ss');

        return new Twilio(
            $config['sid'], $config['token']
        );
    },

    /* FLASH MESSAGES */
    Messages::class => function () {

        return new Messages;
    },

    /* Guzzle HttpClient */
    HttpClient::class => function () {

        return new HttpClient();
    },

    /* MAILER */
    Mailer::class => function (ContainerInterface $container) {

        $transport = (new Swift_SmtpTransport($container->get(Config::class)->get('service.ms.host'), $container->get(Config::class)->get('service.ms.port'), 'tls'))
            ->setUsername($container->get(Config::class)->get('service.ms.username'))
            ->setPassword($container->get(Config::class)->get('service.ms.password'))
            ->setStreamOptions(array('ssl' => array('allow_self_signed' => true, 'verify_peer' => false)));

        $swift = (new Swift_Mailer($transport));

        return (new Mailer($swift, $container->get(Twig::class)))
            ->alwaysFrom($container->get(Config::class)->get('service.ms.from.address'));
    },

    /* ROUTER */
    'router' => get(Router::class),

    /* TRANSLATOR */
    Translator::class => function (ContainerInterface $container) {

        $fallback = $container->get(Config::class)->get('i18n.translations.fallback');

        $loader = new FileLoader(
            new Filesystem(), $container->get(Config::class)->get('i18n.translations.path')
        );

        $translator = new Translator($loader, $_SESSION['lang'] ?? $fallback);
        $translator->setFallback($fallback);

        return $translator;
    },

    /* TWIG */
    Twig::class => function (ContainerInterface $container) {

        $config = $container->get(Config::class);

        $twig = Factory::getEngine($config);

        /* EXTENSIONS */
        $twig->addExtension(new TwigExtension(

            $container->get('router'),
            $container->get('request')->getUri()
        ));

        $twig->addExtension(new GetEnvExtension());

        $twig->addExtension(new GetYamlExtension(
            $container->get(Config::class)
        ));

        $twig->addExtension(new IntlExtension());

        $twig->addExtension(new TranslationExtension(
            $container->get(Translator::class)
        ));

        /* GLOBALS */
        $twig->getEnvironment()->addGlobal('session', $_SESSION);

        $twig->getEnvironment()->addGlobal('app_version', $container->get(AppDetails::class)->getVersion());

        $twig->getEnvironment()->addGlobal('php_version', $container->get(AppDetails::class)->getPHPVersion());

        $twig->getEnvironment()->addGlobal('current_path', $container->get('request')->getUri());

        $twig->getEnvironment()->addGlobal('flash', $container->get(Messages::class));

        $twig->getEnvironment()->addGlobal('auth', [

            'user' => Sentinel::check()
        ]);

        return $twig;
    },

    /* UPLOAD -> IMAGES */
    ImageManager::class => function (ContainerInterface $container) {

        $config = $container->get(Config::class);

        $manager = new ImageManager();
        $manager->configure($config->get('storage.upload.image'));

        return $manager;
    },

    /* VALIDATOR */
    ValidatorInterface::class => function () {

        return new Validator;
    },

];
