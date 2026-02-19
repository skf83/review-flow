<?php

namespace app\validations\users\password;

use Respect\Validation\Rules\AbstractRule;

class ConfirmPassword extends AbstractRule {

    protected $password;

    public function __construct( $password) {

        $this->password= $password;
    }

    public function validate( $input ) {

        return $input === $this->password;
    }
}
