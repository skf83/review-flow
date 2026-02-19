<?php

namespace app\validations\users\password;

use app\models\data\User;
use Respect\Validation\Rules\AbstractRule;

class PasswordMatches extends AbstractRule {

    /**
     * @var string
     */
    protected string $password;

	public function __construct($password) {

		$this->password = $password;
	}

    /**
     * @param $input
     *
     * @return bool
     */
    public function validate($input) : bool {

		return password_verify($input, $this->password);
	}
}
