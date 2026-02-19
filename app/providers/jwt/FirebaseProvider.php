<?php

namespace app\providers\jwt;

use Firebase\JWT\{
    Key,
    JWT
};

use Interop\Container\ContainerInterface;

use Noodlehaus\Config;

use Psr\Container\{
    ContainerExceptionInterface,
    NotFoundExceptionInterface
};

class FirebaseProvider implements JwtProviderInterface {

    protected ContainerInterface $container;
    protected Config $config;

    /**
     * FirebaseProvider constructor.
     *
     * @param ContainerInterface $container
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function __construct(ContainerInterface $container) {

        $this->container    = $container;
        $this->config       = $this->container->get(Config::class);
    }

    /**
     * @param array $claims
     *
     * @return string
     */
    public function encode(array $claims) : string {

        return JWT::encode($claims, $this->config->get('auth.jwt.secret'), 'HS256');
    }

    /**
     * @param $token
     *
     * @return \stdClass
     */
    public function decode($token) : \stdClass {

        return JWT::decode($token, new Key($this->config->get('auth.jwt.secret'), 'HS256'));
    }
}
