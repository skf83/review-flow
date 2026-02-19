<?php

namespace app\handlers\auth\jwt;

use app\providers\jwt\JwtProviderInterface;

class Parser {

    protected $jwtProvider;

    /**
     * Parser constructor.
     *
     * @param JwtProviderInterface $jwtProvider
     */
    public function __construct(JwtProviderInterface $jwtProvider) {

        $this->jwtProvider = $jwtProvider;
    }

    /**
     * @param $token
     *
     */
    public function decode($token) {

        return $this->jwtProvider->decode($this->extractToken($token));
    }

    /**
     * @param $token
     *
     */
    protected function extractToken($authHeader) {

        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {

            return $matches[1];
        }

        return null;
    }
}
