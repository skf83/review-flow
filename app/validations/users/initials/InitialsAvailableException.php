<?php

namespace app\validations\users\initials;

use Respect\Validation\Exceptions\ValidationException;

class InitialsAvailableException extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'User initials already taken!',
		],
	];
}
