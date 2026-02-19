<?php

namespace app\console\commands;

use app\console\BaseCommand;

use Symfony\Component\Console\{
    Input\InputArgument,
    Input\InputInterface,
    Input\InputOption,
    Output\OutputInterface
};

class SayHelloCommand extends BaseCommand {

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
    protected $command = 'say:hello';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Type to say hello';

    /**
     * Handle the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        for ($i = 0; $i < $this->option('repeat'); $i++) {

            $output->writeln('Hello ' . $input->getArgument('name') . ' from command!');
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
                'Tell us your name'
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
                'repeat',
                'r',
                InputOption::VALUE_OPTIONAL,
                'How many times do you want to say hello?',
                1
            ]
        ];
    }
}