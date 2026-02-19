<?php

namespace app\handlers\notifier;

use GuzzleHttp\Exception\{
    GuzzleException
};

class Slack extends Service {

    /**
     * @param $message
     *
     * @return mixed
     */
    public function sendNotification($message) {

        $token = $this->config->get('service.sl.web_hook_token');

        $data = (object) [
            "text" => $message
        ];

        try {

            $response = $this->client->request('POST', "https://hooks.slack.com/services/".$token, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ])->getBody();

        } catch (GuzzleException $exeption) {

            dump($exeption);
        }

        return json_decode($response);
    }
}