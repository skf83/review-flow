<?php

namespace app\models\mail\auth;

use app\handlers\{
    mailer\Mailable,
};

use app\models\{
    data\User,
};

use Illuminate\Translation\Translator;

class Welcome extends Mailable {

    protected Translator $translator;
    protected User $user;

    /**
     * NewToken constructor.
     *
     * @param Translator $translator
     * @param User $user
     */
    public function __construct(User $user, Translator $translator) {

        $this->user = $user;
        $this->translator = $translator;
    }

    /**
     * @return Welcome
     */
    public function build() : Welcome {

        return $this->subject("{$this->translator->get('mail.user.welcome_subject')}")
            ->view('/@shared/templates/mail/welcome.twig')
            //->attach(__DIR__ . '/../../../README.md')
            ->with([
                'user' => $this->user
            ]);
    }
}
