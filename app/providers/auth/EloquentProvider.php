<?php

namespace app\providers\auth;

use app\models\data\User;

class EloquentProvider implements JwtAuthServiceProvider {

    /**
     * @param $email
     * @param $password
     *
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function byCredentials($email, $password) {

        $user = User::with([])->where('email', '=', $email)->first();

        if (!$user) {

            return null;
        }

        if (!password_verify($password, $user->password)) {

            return null;
        }

        return $user;
    }

    public function byId($id) {

        return User::find($id);
    }
}
