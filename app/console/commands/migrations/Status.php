<?php

namespace app\console\commands\migrations;

use app\console\BaseCommand;

use Phinx\Console\PhinxApplication;

use Symfony\Component\Console\Exception\ExceptionInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Status extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'data:migration-status';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Show migration status';

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

        $phinx = new PhinxApplication();
        $command = $phinx->find('status');

        $arguments = [
            'command' => 'status'
        ];

        $greetInput = new ArrayInput($arguments);

        try {

            $command->run($greetInput, $output);

        } catch (\Exception $error) {

            dump($error);

            return 1;

        }

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

            // ...

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
                'environment',
                'e',
                InputOption::VALUE_OPTIONAL,
                'The target environment',
                'development'
            ],
            [
                'format',
                'f',
                InputOption::VALUE_OPTIONAL,
                'The output format: text or json. Defaults to text',
                'text'
            ]
        ];
    }
}
