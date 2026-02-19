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

class Create extends BaseCommand {

    /**
     * The name of the interface that any external template creation class is required to implement.
     */
    const CREATION_INTERFACE = 'Phinx\Migration\CreationInterface';

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'data:create-table';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Create a new database migration table';

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
        $command = $phinx->find('create');

        $arguments = [
            'command' => 'create',
            'name'    => $input->getArgument('name')
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
            [
                'name',
                InputArgument::REQUIRED,
                'What is the name of the migration (in CamelCase)?'
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
                'template',
                't',
                InputOption::VALUE_OPTIONAL,
                'Use an alternative template',
                ''
            ],
            [
                'class',
                'c',
                InputOption::VALUE_OPTIONAL,
                'Use a class implementing "' . self::CREATION_INTERFACE . '" to generate the template',
                ''
            ],
            [
                'path',
                null,
                InputOption::VALUE_OPTIONAL,
                'Specify the path in which to create this migration',
                ''
            ]
        ];
    }
}
