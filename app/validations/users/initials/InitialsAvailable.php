<?php

namespace app\validations\users\initials;

use app\models\data\User;
use Respect\Validation\Rules\AbstractRule;

class InitialsAvailable extends AbstractRule {

	public function validate($input) {

		return User::with([])->where('initials', '=', $input)->count() === 0;
	}
}
