<?php

namespace app\views\extensions;

use Noodlehaus\Config;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GetYamlExtension extends AbstractExtension {

    protected $config;

    /**
     * TranslationExtension constructor.
     * @param Config $config
     */
    public function __construct(Config $config) {

        $this->config = $config;
    }

    public function getFunctions(): array {

        return [
            new TwigFunction('get_config', [$this, 'getConfig']),
        ];
    }

    public function getConfig($variable) {

        return $this->config->get($variable);
    }
}