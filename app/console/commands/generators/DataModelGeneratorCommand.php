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

class DataModelGeneratorCommand extends BaseCommand {

    use Generatable;

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'make:datamodel';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Generates a new Datamodel command.';

    /**
     * Handle the command.
     *
     * @param  InputInterface $input
     * @param  OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        $controllerBase = __DIR__ . '/../../../models/data';
        $path = $controllerBase . '/';
        $namespace = 'app\\models\\data';

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
            return $this->error('Datamodel already exists!');
        }

        $stub = $this->generateStub('datamodel', [
            'DummyClass' => $fileName,
            'DummyNamespace' => $namespace,
        ]);

        file_put_contents($target, $stub);

        $this->info('Datamodel generated!');

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
                'The name of the datamodel to generate.'
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
