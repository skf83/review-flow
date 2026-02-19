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

class ControllerGeneratorCommand extends BaseCommand {

    use Generatable;

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'make:controller';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Generates a new Controller command.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $controllerBase = __DIR__ . '/../../../controllers';
        $path = $controllerBase . '/';
        $namespace = 'app\\controllers';

        $fileParts = explode('\\', $this->argument('name'));
        $fileName = array_pop($fileParts);

        $cleanPath = implode('/', $fileParts);

        if (count($fileParts) >= 1) {
            $path = $path . $cleanPath;

            $namespace = $namespace . '\\' . str_replace('/', '\\', $cleanPath);

            if (!is_dir($path)) {
                mkdir($path, 0777, true);
            }
        }

        $target = $path . '/' . $fileName . '.php';

        if (file_exists($target)) {
            return $this->error('Controller already exists!');
        }

        $stub = $this->generateStub('controller', [
            'DummyClass' => $fileName,
            'DummyNamespace' => $namespace,
        ]);

        file_put_contents($target, $stub);

        $this->info('Controller generated!');

        return 0;
    }

    /**
     * Command arguments
     *
     * @return array
     */
    protected function arguments(): array {

        return [
            [
                'name',
                InputArgument::REQUIRED,
                'The name of the controller to generate.'
            ]
        ];
    }

    /**
     * Command options.
     *
     * @return array
     */
    protected function options(): array {

        return [

            //

        ];
    }
}
