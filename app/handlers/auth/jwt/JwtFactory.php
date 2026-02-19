<?php

namespace app\handlers\auth\jwt;

use app\providers\jwt\JwtProviderInterface;

class JwtFactory {

    protected $claims;
    protected $claimsFactory;
    protected $jwtProvider;

    /**
     * JwtFactory constructor.
     *
     * @param JwtClaims $claimsFactory
     * @param JwtProviderInterface $jwtProvider
     */
    public function __construct(JwtClaims $claimsFactory, JwtProviderInterface $jwtProvider) {

        $this->claimsFactory = $claimsFactory;
        $this->jwtProvider   = $jwtProvider;
    }

    /**
     * @param array $claims
     *
     * @return $this
     */
    public function withClaims(array $claims) {

        $this->claims = $claims;

        return $this;
    }

    /**
     * @return array
     */
    public function make() {

        $claims = [];

        foreach ($this->getDefaultClaims() as $claim) {

            $claims[$claim] = $this->claimsFactory->get($claim);
        }

        return array_merge($this->claims, $claims);
    }

    /**
     * @return array
     */
    protected function getDefaultClaims() {

        return $this->claimsFactory->getDefaultClaims();
    }

    /**
     * @param array $claims
     *
     * @return mixed
     */
    public function encode(array $claims) {

        return $this->jwtProvider->encode($claims);
    }
}
