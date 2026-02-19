<?php

namespace app\validations\users\email;

use app\models\data\User;
use Respect\Validation\Rules\AbstractRule;

class EmailAvailable extends AbstractRule {

	public function validate($input) {

		return User::with([])->where('email', '=', $input)->count() === 0;
	}
}
