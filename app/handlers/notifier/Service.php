<?php

namespace app\handlers\notifier;

use GuzzleHttp\Client as Guzzle;

use Noodlehaus\Config;

use Twilio\{
    Rest\Client as Twilio
};

abstract class Service {

    protected $client;
    protected $config;
    protected $sms;


    /**
     * Service constructor.
     *
     * @param Guzzle $client
     * @param Config $config
     * @param Twilio $sms
     */
    public function __construct(Guzzle $client, Config $config, Twilio $sms) {

        $this->client = $client;
        $this->config = $config;
        $this->sms = $sms;
    }

    abstract public function sendNotification($event);

    /**
     * @param $event
     *
     * @return mixed
     */
    public function notification($event) {

        return $this->sendNotification($event);
    }
}