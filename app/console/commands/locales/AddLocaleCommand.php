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

class AddLocaleCommand extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'locale:add';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Add locale to database.';

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

            $output->writeln("<error>{$this->argument('code')} already exists in database!</error>");

        } else {

            $locale = Locale::with([])->firstOrCreate([

                'code'      => $this->argument('code')

            ], [

                'name'      => $this->argument('name'),
                'code'      => $this->argument('code'),
                'activated' => $input->getOption('activated')
            ]);

            $output->writeln("<info>{$this->argument('code')} added to database</info>");
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
                'Language name'
            ],
            [
                'code',
                InputArgument::REQUIRED,
                'Language code'
            ],
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
                'activated',
                'a',
                InputOption::VALUE_OPTIONAL,
                'Should the new language be activated or not?',
                false
            ]
        ];
    }
}
