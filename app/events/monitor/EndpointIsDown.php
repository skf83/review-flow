<?php

namespace app\events\monitor;

use Noodlehaus\Config;

use Symfony\Contracts\EventDispatcher\Event;

use app\models\monitor\Endpoint;

class EndpointIsDown extends Event {

    const NAME = 'endpoint.down';

    public $config;
    public $endpoint;

    public function __construct(Config $config, Endpoint $endpoint) {

        $this->config = $config;
        $this->endpoint = $endpoint;
    }
}