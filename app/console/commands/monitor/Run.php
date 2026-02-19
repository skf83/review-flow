<?php

namespace app\console\commands\monitor;

use app\console\{
    BaseCommand,
    commands\monitor\scheduler\Kernel,
    commands\monitor\tasks\PingEndpoint,
    traits\CanForce
};

use app\models\{
    monitor\Endpoint
};

use Symfony\Component\{
    Console\Input\InputOption,
    Console\Input\InputInterface,
    Console\Output\OutputInterface,
};

class Run extends BaseCommand {

    use CanForce;

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'endpoint:run';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $kernel = new Kernel();

        $endpoints = Endpoint::with([])->get();

        foreach ($endpoints as $endpoint) {

            $kernel
                ->add(new PingEndpoint($this->client, $this->config, $this->dispatcher, $endpoint))
                ->everyMinutes($this->isForced($input) ? 1 : $endpoint->frequency);
        }

        $kernel->run();

        return 0;
    }

    /**
     * Command arguments
     *
     * @return array
     */
    protected function arguments(): array {

        /**
         *  name
         *  mode
         *  description
         */
        return [

            //

        ];
    }

    /**
     * Command options.
     *
     * @return array
     */
    protected function options(): array {

        /**
         *  name
         *  shortcut
         *  mode
         *  description
         *  default
         */
        return [
            [
                'force',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Force check regardless of frequency',
                false
            ]
        ];
    }
}
