<?php

namespace app\validations\users\domain;

use Respect\Validation\Exceptions\ValidationException;

class DomainCheckException extends ValidationException {

	public static $defaultTemplates = [
		self::MODE_DEFAULT => [
			self::STANDARD => 'SKAL indeholde @tune-trafikskole.dk!',
		],
	];
}