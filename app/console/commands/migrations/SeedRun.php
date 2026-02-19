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

class SeedRun extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'data:seed-run';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Run database seeders';

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
        $command = $phinx->find('seed:run');

        $arguments = [
            'command' => 'seed:run'
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
                'seed',
                's',
                InputOption::VALUE_REQUIRED,
                'What is the name of the seeder?',
                null
            ],
        ];
    }
}
