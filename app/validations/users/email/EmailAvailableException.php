<?php

namespace app\validations\users\email;

use Respect\Validation\Exceptions\ValidationException;

class EmailAvailableException extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'Email already taken!',
		],
	];
}
