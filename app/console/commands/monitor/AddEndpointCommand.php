<?php

namespace app\console\commands\monitor;

use app\console\BaseCommand;

use app\models\monitor\Endpoint;

use Symfony\Component\Console\{
    Exception\ExceptionInterface,
    Input\ArrayInput,
    Input\InputArgument,
    Input\InputInterface,
    Input\InputOption,
    Output\OutputInterface
};

class AddEndpointCommand extends BaseCommand {

    /*
    |---------------------------------------------------------------
    | TODO
    |---------------------------------------------------------------
    |
    | Don't forget to add your newly created console-command to the
    | $commands[] in Kernel.php (you can find it in : app\console),
    | so that the Element cli can start to use it!
    |
    */

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'endpoint:add';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Adds an endpoint to monitor';

    /**
     * Handle the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws ExceptionInterface
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $endpoint = Endpoint::with([])->where('uri', '=', $input->getArgument('endpoint'))->first();

        if ($endpoint) {

            $output->writeln("<info>Endpoint is already being monitored!</info>");

        } else {

            Endpoint::with([])->create([
                'uri'       => $uri = $input->getArgument('endpoint'),
                'frequency' => $input->getOption('frequency')
            ]);

            $output->writeln("<info>Endpoint {$uri} is now being monitored.</info>");
        }

//        $this->getApplication()->find('endpoint:status')->run(
//            new ArrayInput([
//                'command' => 'endpoint:status'
//            ]),
//            $output
//        );

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
            [
                'endpoint',
                InputArgument::REQUIRED,
                'The endpoint to monitor'
            ]
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
                'frequency',
                'f',
                InputOption::VALUE_OPTIONAL,
                'The frequency to check this endpoint, in minutes.',
                60
            ]
        ];
    }
}
