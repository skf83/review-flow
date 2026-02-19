<?php

namespace app\validations\users\phone;

use Respect\Validation\Exceptions\ValidationException;

class PhoneAvailableException extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Phone already taken!',
		],
	];
}
