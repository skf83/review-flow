<?php

namespace app\handlers\mailer;

use Swift_Message;
use Swift_Attachment;

class MessageBuilder {

    protected $swiftMessage;

    /**
     * MessageBuilder constructor.
     *
     * @param Swift_Message $swiftMessage
     */
    public function __construct(Swift_Message $swiftMessage) {

        $this->swiftMessage = $swiftMessage;
    }

    /**
     * @param $address
     * @param null $name
     *
     * @return $this
     */
    public function to($address, $name = null) {

        $this->swiftMessage->setTo($address, $name);

        return $this;
    }

    /**
     * @param $subject
     *
     * @return $this
     */
    public function subject($subject) {

        $this->swiftMessage->setSubject($subject);

        return $this;
    }

    /**
     * @param $file
     *
     * @return $this
     */
    public function attach($file) {

        $this->swiftMessage->attach(Swift_Attachment::fromPath($file));

        return $this;
    }

    /**
     * @param $body
     *
     * @return $this
     */
    public function body($body) {

        $this->swiftMessage->setBody($body, 'text/html');

        return $this;
    }

    /**
     * @param $address
     * @param null $name
     *
     * @return $this
     */
    public function from($address, $name = null) {

        $this->swiftMessage->setFrom($address, $name);

        return $this;
    }

    /**
     * @return Swift_Message
     */
    public function getSwiftMessage() {

        return $this->swiftMessage;
    }
}