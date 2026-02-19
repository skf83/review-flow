<?php

namespace app\console\commands\locales;

use app\console\BaseCommand;

use app\models\data\Locale;

use Symfony\Component\{
    Console\Input\InputOption,
    Console\Input\InputArgument,
    Console\Input\InputInterface,
    Console\Output\OutputInterface
};

class ListLocalesCommand extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'locale:list';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'List all locales.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $locales = Locale::all();

        if($locales) {

            foreach ($locales as $locale) {

                $output->writeln("\n| id: <info>{$locale->id}</info>\n|--------------------------------------------------------------------|\n| name:  <info>{$locale->name}</info>\n| code:  <info>{$locale->code}</info>\n| activated: <info>{$locale->activated}</info>\n|--------------------------------------------------------------------|");
            }

        } else {

            $output->writeln("<error>No locales exists in database!?</error>");
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
