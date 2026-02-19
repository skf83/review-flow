<?php

namespace app\providers\jwt;

interface JwtProviderInterface {

    public function encode(array $claims);
    public function decode($token);
}
