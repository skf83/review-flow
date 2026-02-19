<?php

namespace app\listeners\endpoint;

use app\handlers\notifier\Slack;

use Symfony\Contracts\EventDispatcher\Event;

class Slack_UpNotification {

    protected $slack;

    /**
     * Slack_DownNotification constructor.
     *
     * @param Slack $slack
     */
    public function __construct(Slack $slack) {

        $this->slack = $slack;
    }

    /**
     * @param Event $event
     *
     */
    public function handle(Event $event) {

        $message = "{$event->endpoint->uri} is UP with status code of {$event->endpoint->status->status_code}";

        $this->slack->sendNotification($message);
    }
}