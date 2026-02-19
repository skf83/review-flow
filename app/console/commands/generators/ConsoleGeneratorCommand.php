<?php

namespace app\console\commands\generators;

use app\console\BaseCommand;

use app\console\traits\Generatable;

use Symfony\Component\Console\{
    Input\InputArgument,
    Input\InputInterface,
    Input\InputOption,
    Output\OutputInterface
};

class ConsoleGeneratorCommand extends BaseCommand {

    use Generatable;

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'make:console';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Generates a new console command.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $stub = $this->generateStub('command', [
            'DummyClass' => $this->argument('name'),
        ]);

        $target = __DIR__ . '/../' . $this->argument('name') . '.php';

        if (file_exists($target)) {
            return $this->error('Command already exists!');
        }

        file_put_contents($target, $stub);

        $this->info('Console command generated!');

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
                'The name of the command to generate.'
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

            //...

        ];
    }
}
