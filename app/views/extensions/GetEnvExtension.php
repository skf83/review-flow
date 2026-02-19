<?php

namespace app\views\extensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GetEnvExtension extends AbstractExtension {

    public function getFunctions() {

        return [
            new TwigFunction('get_env', [$this, 'getEnv']),
        ];
    }

    public function getEnv($variable) {

        return env($variable);
    }
}