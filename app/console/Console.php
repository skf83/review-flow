<?php

namespace app\console;

use Slim\App;

use Symfony\Component\Console\Application;

class Console extends Application {

    protected App $slim;

    public function __construct(App $slim) {

        parent::__construct('Element Framework', $this->getAppVersion());
        $this->slim = $slim;
    }

    public function boot(Kernel $kernel) {

        foreach ($kernel->getCommands() as $command) {

            $this->add(new $command($this->getSlim()->getContainer()));
        }
    }

    protected function getSlim() {

        return $this->slim;
    }

    protected function getAppVersion() {

        $content = file_get_contents('composer.json');
        $content = json_decode($content,true);

        return $content['version'];
    }
}
