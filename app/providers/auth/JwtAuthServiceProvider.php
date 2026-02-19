<?php

namespace app\providers\auth;

interface JwtAuthServiceProvider {

    public function byCredentials($email, $password);
    public function byId($id);
}
