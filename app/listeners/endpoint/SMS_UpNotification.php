<?php

namespace app\listeners\endpoint;

use app\handlers\notifier\Twilio;

use Symfony\Contracts\EventDispatcher\Event;

class SMS_UpNotification {

    protected $twilio;

    /**
     * SMS_DownNotification constructor.
     *
     * @param Twilio $twilio
     */
    public function __construct(Twilio $twilio) {

        $this->twilio = $twilio;
    }

    /**
     * @param Event $event
     */
    public function handle(Event $event) {

        $message = "{$event->endpoint->uri} is UP with status code of {$event->endpoint->status->status_code}";

        $this->twilio->sendNotification($message);
    }
}