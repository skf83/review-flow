<?php

namespace app\validations\users\phone;

use app\models\data\UserTelephone;

use Respect\Validation\Rules\AbstractRule;

class PhoneAvailable extends AbstractRule {

	public function validate($input) {

		return UserTelephone::with([])->where('tel_mobile', '=', $input)->count() === 0;
	}
}
