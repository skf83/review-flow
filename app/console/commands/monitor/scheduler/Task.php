<?php

namespace app\console\commands\monitor\scheduler;

use app\console\commands\monitor\scheduler\Frequencies;
use Carbon\Carbon;
use Cron\CronExpression;

abstract class Task {

    use Frequencies;

    /**
     * Handle the event.
     *
     * @return mixed
     */
    abstract public function handle();

    /**
     * If this event is due to run.
     *
     * @return boolean
     */
    public function isDueToRun() {

        return CronExpression::factory($this->expression)
            ->isDue(Carbon::now());
    }
}
