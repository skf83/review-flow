<?php

namespace app\handlers\mailer;

use Slim\Views\Twig;

use Swift_Mailer;
use Swift_Message;

use app\handlers\mailer\{
    contracts\MailableContract,
    MessageBuilder,
    PendingMailable,
};

class Mailer {

    protected $swift;
    protected $view;
    protected $from = [];

    /**
     * Mailer constructor.
     *
     * @param Swift_Mailer $swift
     * @param Twig $view
     */
    public function __construct(Swift_Mailer $swift, Twig $view) {

        $this->swift = $swift;
        $this->view = $view;
    }

    /**
     * @param $address
     * @param null $name
     *
     * @return \app\handlers\mailer\PendingMailable
     */
    public function to($address, $name = null) {

        return (new PendingMailable($this))->to($address, $name);
    }

    /**
     * @param $address
     * @param null $name
     *
     * @return $this
     */
    public function alwaysFrom($address, $name = null) {

        $this->from = compact('address', 'name');

        return $this;
    }

    /**
     * @param $view
     * @param array $viewData
     * @param callable|null $callback
     *
     * @return int|void
     */
    public function send($view, $viewData = [], Callable $callback = null) {

        if ($view instanceof MailableContract) {

            return $this->sendMailable($view);
        }

        $message = $this->buildMessage();

        call_user_func($callback, $message);

        $message->body($this->parseView($view, $viewData));

        return $this->swift->send($message->getSwiftMessage());
    }

    /**
     * @param Mailable $mailable
     */
    protected function sendMailable(Mailable $mailable) {

        return $mailable->send($this);
    }

    /**
     * @return \app\handlers\mailer\MessageBuilder
     */
    protected function buildMessage() {

        return (new MessageBuilder(new Swift_Message))
            ->from($this->from['address'], $this->from['name']);
    }

    /**
     * @param $view
     * @param $viewData
     *
     * @return string
     *
     * @throws \Twig\Error\LoaderError
     */
    protected function parseView($view, $viewData) {

        return $this->view->fetch($view, $viewData);
    }
}