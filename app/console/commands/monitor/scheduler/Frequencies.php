<?php

namespace app\console\commands\monitor\scheduler;

trait Frequencies {

    protected $expression = '* * * * *';

    /**
     * Run every 10 minutes.
     *
     * @param int $minutes
     */
    public function everyMinutes($minutes = 1) {

        $this->expression = "*/{$minutes} * * * *";
    }
}
