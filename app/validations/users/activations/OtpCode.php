<?php

namespace app\validations\users\activations;

use Respect\Validation\Rules\AbstractRule;

class OtpCode extends AbstractRule {

    protected $code;

    /**
     * @param $code
     */
    public function __construct($code) {

        $this->code = $code;
    }

    /**
     * @param $input
     *
     * @return bool
     */
    public function validate($input): bool {

        // Use the code passed in constructor, ignore incoming $input
        $value = is_string($this->code) ? trim($this->code) : '';

        return (bool) preg_match('/^\d{3}-\d{3}$/', $value);
    }
}