<?php

namespace app\handlers\notifier;

use Twilio\Exceptions\TwilioException;

class Twilio extends Service {

    /**
     * @param $message
     *
     * @return mixed
     */
    public function sendNotification($message) {

        try {

            $this->sms->messages->create(
                $this->config->get('service.ss.to_number'),
                [
                    'from' => $this->config->get('service.ss.from_number'),
                    'body' => $message,
                ]
            );

        } catch (TwilioException $e) {

            dump($e);
        }
    }
}