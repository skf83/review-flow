<?php

namespace app\handlers\mailer\contracts;

use app\handlers\mailer\Mailer;

interface MailableContract {

    public function send(Mailer $mailer);
}