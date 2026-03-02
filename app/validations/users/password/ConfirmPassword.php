<?php

namespace app\validations\users\password;

use Respect\Validation\Rules\AbstractRule;

class ConfirmPassword extends AbstractRule {

    protected $password;

    /**
     * @param $password
     */
    public function __construct($password) {

        $this->password= $password;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function validate($input): bool {

        return $input === $this->password;
    }
}
