<?php

namespace app\validations\users\password;

use Respect\Validation\Exceptions\ValidationException;

class PasswordMatchesException extends ValidationException {

	public static $defaultTemplates = [

		self::MODE_DEFAULT => [
			self::STANDARD => 'Password incorrect!',
		],
	];
}
