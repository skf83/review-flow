<?php

namespace app\validations;

use Psr\Http\Message\ServerRequestInterface as Request;

use Respect\Validation\Exceptions\NestedValidationException;

use app\validations\contracts\ValidatorInterface;

class Validator implements ValidatorInterface {

	protected $errors = [];

	public function validate(Request $request, array $rules) {

		foreach ($rules as $field => $rule) {

			try {

				$rule->setName(ucfirst($field))->assert($request->getParam($field));
			}

			catch (NestedValidationException $e) {

				$this->errors[$field] = $e->getMessages();
			}
		}

		// passing errors into a session
		$_SESSION['errors'] = $this->errors;

		return $this;
	}

	public function fails() {

		return !empty($this->errors);
	}
}
