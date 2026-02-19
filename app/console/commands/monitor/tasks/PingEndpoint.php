<?php

namespace app\console\commands\monitor\tasks;

use app\console\commands\monitor\{
    scheduler\Task
};

use app\events\monitor\{
    EndpointIsDown,
    EndpointIsUp
};

use app\models\{
    monitor\Endpoint
};

use GuzzleHttp\{
    Client,
    Exception\GuzzleException,
    Exception\RequestException
};

use Noodlehaus\Config;

use Symfony\Component\{
    EventDispatcher\EventDispatcher
};

class PingEndpoint extends Task {

    protected $client;
    protected $config;
    protected $dispatcher;
    protected $endpoint;

    /**
     * PingEndpoint constructor.
     *
     * @param Client $client
     * @param Config $config
     * @param EventDispatcher $dispatcher
     * @param Endpoint $endpoint
     */
    public function __construct(Client $client, Config $config, EventDispatcher $dispatcher, Endpoint $endpoint) {

        $this->client = $client;
        $this->config = $config;
        $this->dispatcher = $dispatcher;
        $this->endpoint = $endpoint;
    }

    public function handle() {

        try {

            $response = $this->client->request('GET', $this->endpoint->uri);

        } catch (RequestException $error) {

            $response = $error->getResponse();
        }

        $this->endpoint->statuses()->create([

            'status_code' => $response->getStatusCode()
        ]);

        $this->dispatchEvents($this->config);
    }

    /**
     * @param $config
     */
    private function dispatchEvents($config) {

        if ($this->endpoint->status->isDown()) {

            $this->dispatcher->dispatch(new EndpointIsDown($config, $this->endpoint),EndpointIsDown::NAME);
        }

        if ($this->endpoint->isBackUp()) {

            $this->dispatcher->dispatch(new EndpointIsUp($config, $this->endpoint), EndpointIsUp::NAME);
        }
    }

}