<?php

namespace app\handlers\auth\jwt;

use app\handlers\auth\jwt\contracts\JwtSubject;
use app\providers\auth\JwtAuthServiceProvider;

class JwtAuth {

    protected $auth;
    protected $factory;
    protected $parser;

    protected $user = null;

    /**
     * JwtAuth constructor.
     *
     * @param JwtAuthServiceProvider $auth
     * @param JwtFactory $factory
     * @param Parser $parser
     */
    public function __construct(JwtAuthServiceProvider $auth, JwtFactory $factory, Parser $parser) {

        $this->auth     = $auth;
        $this->factory  = $factory;
        $this->parser   = $parser;
    }

    /**
     * @param $email
     * @param $password
     *
     * @return bool|mixed
     */
    public function attempt($email, $password) {

        $user = $this->auth->byCredentials($email, $password);

        if (!$user) {

            return false;
        }

        return $this->fromSubject($user);
    }

    /**
     * @param $token
     *
     * @return $this
     */
    public function authenticate($token) {

        $this->user = $this->auth->byId(

            $this->parser->decode($token)->sub
        );

        return $this;
    }

    /**
     * @return null
     */
    public function user() {

        return $this->user;
    }

    /**
     * @param JwtSubject $subject
     *
     * @return mixed
     */
    protected function fromSubject(JwtSubject $subject) {

        return $this->factory->encode($this->makePayload($subject));
    }

    /**
     * @param JwtSubject $subject
     *
     * @return array
     */
    protected function makePayload(JwtSubject $subject) {

        return $this->factory->withClaims($this->getClaimsForSubject($subject))->make();
    }

    /**
     * @param JwtSubject $subject
     *
     * @return array
     */
    protected function getClaimsForSubject(JwtSubject $subject) {

        return [
            'sub' => $subject->getJwtIdentifier()
        ];
    }
}
