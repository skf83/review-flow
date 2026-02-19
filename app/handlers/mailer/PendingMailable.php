<?php

namespace app\handlers\mailer;

use app\handlers\mailer\Mailer;

class PendingMailable {

    /**
     * PendingMailable constructor.
     *
     * @param \app\handlers\mailer\Mailer $mailer
     */
    public function __construct(Mailer $mailer) {

        $this->mailer = $mailer;
    }

    /**
     * @param $address
     * @param null $name
     *
     * @return $this
     */
    public function to($address, $name = null) {

        $this->to = compact('address', 'name');

        return $this;
    }

    /**
     * @param Mailable $mailable
     *
     * @return int|void
     */
    public function send(Mailable $mailable) {

        $mailable->to($this->to['address'], $this->to['name']);

        return $this->mailer->send($mailable);
    }
}