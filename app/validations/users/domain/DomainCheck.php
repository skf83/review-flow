<?php

namespace app\validations\users\domain;

use Respect\Validation\Rules\AbstractRule;

class DomainCheck extends AbstractRule {

	/**
	 * go to https://regexr.com/ for more information
	 *
	 * @param $input
	 *
	 * @return bool
	 */
	public function validate($input) {

		if (!preg_match("/@tune-trafikskole.dk/i",$input)) {

			return false;
		}

		return true;
	}
}