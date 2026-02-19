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

class DeactivateLocaleCommand extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'locale:off';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Deactivate a given locale.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $locale = Locale::with([])->where('code', '=', $this->argument('code'))->first();

        if($locale) {

            if($locale->activated == "1") {

                $locale->activated = "0";
                $locale->save();

                $output->writeln("<info>{$locale->name} deactivated</info>");

            } else {

                $output->writeln("<error>{$locale->name} already deactivated</error>");
            }

        } else {

            $output->writeln("<error>{$locale->name} doesn't exist in database</error>");
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
                'code',
                InputArgument::REQUIRED,
                'Locale code'
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
