<?php

namespace app\console\traits;

use Symfony\Component\Console\{
    Input\InputInterface,
    Input\InputOption
};

trait CanForce {

//    public function addForceOption() {
//
//        $this->addOption(
//            'forceRun',
//            'fR',
//            InputOption::VALUE_OPTIONAL,
//            'Force check regardless of frequency',
//            false
//        );
//    }

    protected function isForced(InputInterface $input) {

        return $input->getOption('force') !== false;
    }
}