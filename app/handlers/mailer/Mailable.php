<?php

namespace app\handlers\mailer;

use app\handlers\mailer\{
    Mailer,
    contracts\MailableContract
};

use Illuminate\Translation\Translator;

abstract class Mailable implements MailableContract {

    protected $to = [];
    protected $from = [];
    protected $subject;
    protected $view;
    protected $attachments = [];
    protected $viewData = [];

    /**
     * @param \app\handlers\mailer\Mailer $mailer
     */
    public function send(Mailer $mailer) {

        $this->build();

        $mailer->send($this->view, $this->viewData, function ($message) {

            $message->to($this->to['address'], $this->to['name'])
                ->subject($this->subject);

            if ($this->from) {

                $message->from($this->from['address'], $this->from['name']);
            }

            $this->buildAttachments($message);
        });
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
     * @param $address
     * @param null $name
     *
     * @return $this
     */
    public function from($address, $name = null) {

        $this->from = compact('address', 'name');

        return $this;
    }

    /**
     * @param $view
     *
     * @return $this
     */
    public function view($view) {

        $this->view = $view;

        return $this;
    }

    /**
     * @param array $viewData
     *
     * @return $this
     */
    public function with($viewData = []) {

        $this->viewData = $viewData;

        return $this;
    }

    /**
     * @param $file
     *
     * @return $this
     */
    public function attach($file) {

        $this->attachments[] = $file;

        return $this;
    }

    /**
     * @param $subject
     *
     * @return $this
     */
    public function subject($subject) {

        $this->subject = $subject;

        return $this;
    }

    /**
     * @param MessageBuilder $message
     */
    protected function buildAttachments(MessageBuilder $message) {

        foreach ($this->attachments as $file) {
            $message->attach($file);
        }
    }
}