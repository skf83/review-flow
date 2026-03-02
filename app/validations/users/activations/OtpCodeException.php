<?php

namespace app\validations\users\activations;

use Respect\Validation\Exceptions\ValidationException;

class OtpCodeException extends ValidationException {

    public static $defaultTemplates = [

        self::MODE_DEFAULT => [
            self::STANDARD => "OTP not accepted"
        ]
    ];
}
