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

class Rollback extends BaseCommand {

    /**
     * The name of the interface that any external template creation class is required to implement.
     */
    const CREATION_INTERFACE = 'Phinx\Migration\CreationInterface';

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'data:rollback-migrations';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Rollback the last or to a specific migration';

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
        $command = $phinx->find('rollback');

        $arguments = [
            'command' => 'rollback'
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
                'target',
                't',
                InputOption::VALUE_OPTIONAL,
                'The version number to rollback to',
                ''
            ],
            [
                'date',
                'd',
                InputOption::VALUE_OPTIONAL,
                'The date to rollback to',
                ''
            ],
            [
                'force',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Force rollback to ignore breakpoints',
                ''
            ],
            [
                'dry-run',
                'x',
                InputOption::VALUE_OPTIONAL,
                'Dump query to standard output instead of executing it',
                ''
            ],
            [
                'fake',
                null,
                InputOption::VALUE_OPTIONAL,
                "Mark any migrations selected as run, but don't actually execute them",
                ''
            ]
        ];
    }
}
