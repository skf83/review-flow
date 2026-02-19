<?php

namespace app\console\commands\monitor;

use app\{
    console\BaseCommand,
    models\monitor\Endpoint
};

use Symfony\Component\Console\{
    Exception\ExceptionInterface,
    Input\ArrayInput,
    Input\InputArgument,
    Input\InputInterface,
    Output\OutputInterface
};

class RemoveEndpointCommand extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'endpoint:remove';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Removes an endpoint from being monitored';


    /**
     * Handle the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws \Exception|ExceptionInterface
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $endpoint = Endpoint::with([])->find($id = $input->getArgument('id'));

        if (!$endpoint) {

            $output->writeln("<error>Endpoint with ID: {$id} does not exist.</error>");
        }

        $endpoint->delete();

        $output->writeln("<info>Endpoint {$id} successfully removed!.</info>");

        $this->getApplication()->find('endpoint:status')->run(
            new ArrayInput([
                'command' => 'endpoint:status'
            ]),
            $output
        );

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
                'id',
                InputArgument::REQUIRED,
                'The endpoint ID to remove'
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

            //

        ];
    }
}