<?php

namespace app\console\commands\monitor;

use app\{
    console\BaseCommand,
    console\traits\CanForce,
    models\monitor\Endpoint,
    models\monitor\Status
};

use Symfony\Component\Console\{
    Exception\ExceptionInterface,
    Helper\Table,
    Input\ArrayInput,
    Input\InputOption,
    Input\InputArgument,
    Input\InputInterface,
    Output\OutputInterface
};

class StatusCommand extends BaseCommand {

    use CanForce;

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'endpoint:status';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'View currents status on endpoints!';

    /**
     * Handle the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws \Exception|ExceptionInterface
     */
    public function handle(InputInterface $input, OutputInterface $output):int {

        if ($this->isForced($input)) {

            $this->getApplication()->find('endpoint:run')->run(
                new ArrayInput([
                    'command' => 'endpoint:run',
                    '--force' => true
                ]),
                $output
            );
        }

        $endpoints = Endpoint::with('statuses')->get();

        $table = new Table($output);

        $table->setHeaders(['ID', 'URI', 'Frequency', 'Last checked', 'Status', 'Response code'])
            ->setRows(
                $endpoints->map(function ($endpoint) {
                    return array_merge(
                        $endpoint->only(['id', 'uri', 'frequency']),
                        $endpoint->status ? $this->getEndpointStatus($endpoint) : []
                    );
                })->toArray()
            );

        $table->render();

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

    /**
     * @param Endpoint $endpoint
     *
     * @return array
     */
    protected function getEndpointStatus(Endpoint $endpoint) : array {

        return [
            'created_at' => $endpoint->status->created_at,
            'status' => $this->formatStatus($endpoint->status),
            'status_code' => $this->formatResponseCode($endpoint->status),
        ];
    }

    /**
     * @param Status $status
     *
     * @return string
     */
    protected function formatStatus(Status $status) : string {

        if ($status->isDown()) {

            return '<error>Down</error>';
        }

        return '<bg=green;fg=black>Up</>';
    }

    /**
     * @param Status $status
     *
     * @return string
     */
    protected function formatResponseCode(Status $status) : string {

        if ($status->isDown()) {

            return "<error>{$status->status_code}</error>";
        }

        return "<bg=green;fg=black>{$status->status_code}</>";
    }
}