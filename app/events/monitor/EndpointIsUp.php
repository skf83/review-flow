<?php

namespace app\events\monitor;

use Noodlehaus\Config;
use Symfony\Contracts\EventDispatcher\Event;

use app\models\monitor\Endpoint;

class EndpointIsUp extends Event {

    const NAME = 'endpoint.up';

    public $config;
    public $endpoint;

    public function __construct(Config $config, Endpoint $endpoint) {

        $this->config = $config;
        $this->endpoint = $endpoint;
    }
}