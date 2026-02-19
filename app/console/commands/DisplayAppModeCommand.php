<?php

namespace app\console\commands;

use app\console\BaseCommand;

use Symfony\Component\Console\{
    Input\InputInterface,
    Output\OutputInterface
};

class DisplayAppModeCommand extends BaseCommand {

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
    protected $command = 'app:mode';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Shows which mode your app is currently running in?';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $mode = $_ENV["APP_MODE"];

        $output->writeln("App-mode is currently set to : <info>{$mode}</info>");

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
            //
        ];
    }
}
