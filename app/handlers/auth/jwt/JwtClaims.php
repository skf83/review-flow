<?php

namespace app\handlers\auth\jwt;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Interop\Container\ContainerInterface;
use Noodlehaus\Config;
use Psr\Http\Message\RequestInterface;

class JwtClaims {

    protected array $defaultClaims = [
        'iss',
        'iat',
        'exp',
        'nbf',
        'jti'
    ];

    protected ContainerInterface $container;
    protected RequestInterface $request;

    /**
     * JwtClaims constructor.
     *
     * @param ContainerInterface $container
     * @param RequestInterface $request
     */
    public function __construct(ContainerInterface $container, RequestInterface $request) {

        $this->container = $container;
        $this->request   = $request;
        $this->env       = $this->container->get(Config::class);
    }

    /**
     * @return array
     */
    public function getDefaultClaims() {

        return $this->defaultClaims;
    }

    /**
     * @return string
     */
    public function iss() {

        return $this->request->getUri()->getPath();
    }

    /**
     * @return int
     */
    public function iat() {

        return Carbon::now()->getTimestamp();
    }

    /**
     * @return int
     */
    public function nbf() {

        return Carbon::now()->getTimestamp();
    }

    /**
     * @return string
     */
    public function jti() {

        return bin2hex(Str::random(32));
    }

    /**
     * @return int
     */
    public function exp() {

        return Carbon::now()->addMinutes($this->env->get('auth.jwt.expiry'))->getTimestamp();
    }

    /**
     * @param $claim
     *
     * @return null
     */
    public function get($claim) {

        if (!method_exists($this, $claim)) {

            return null;
        }

        return $this->{$claim}();
    }
}
