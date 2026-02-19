<?php

namespace app\console\commands;

use app\console\BaseCommand;

use Symfony\Component\Console\{
    Exception\ExceptionInterface,
    Input\InputInterface,
    Input\InputOption,
    Output\OutputInterface
};

class StartServerCommand extends BaseCommand {

    /**
     * The command name.
     *
     * @var string
     */
    protected $command = 'app:serve';

    /**
     * The command description.
     *
     * @var string
     */
    protected $description = 'Serve the application on the PHP development server';

    /**
     * Handle the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    public function handle(InputInterface $input, OutputInterface $output): int {

        try {

            $output->writeln("/*\n|-----------------------------------------------------\n| <info>Element dev-server started on:</info>\n|<info> {$this->time()}</info>\n|-----------------------------------------------------\n| Listening on http://{$this->host()}:{$this->port()}\n| Document root is {$this->root()}\n| Press Ctrl-C to quit.\n*/");

            exec('php -S '.$this->host().':'.$this->port());

            return 0;

        } catch (ExceptionInterface $error) {

            $output->writeln("<error> {$error} </error>");
            $output->writeln("<error> {$this->defHost()} </error>");

            return 1;

        }
    }

    /**
     * Getting the current timestamp.
     *
     * @return string
     */
    protected function time() {

        $currentTime = date('r');

        return $currentTime;
    }

    /**
     * Getting the current timestamp.
     *
     * @return string
     */
    protected function root() {

        $root = getcwd();

        return $root;
    }

    /**
     * Get the host for the command.
     *
     * @return string
     */
    protected function host() {

        if($this->input->getOption('port')) {

            return $this->input->getOption('host');

        } else {

            return $this->config->get('el.serve.url');
        }
    }

    /**
     * Get the port for the command.
     *
     * @return string
     */
    protected function port() {

        if($this->input->getOption('port')) {

            return $this->input->getOption('port');

        } else {

            return $this->config->get('el.serve.port');
        }
    }

    /**
     * Command arguments
     *
     * @return array
     */
    protected function arguments() {

        return [

            //

        ];
    }

    /**
     * Command options.
     *
     * @return array
     */
    protected function options() {

        return [
            [
                'host',
                null,
                InputOption::VALUE_OPTIONAL,
                'The host address to serve the application on',
                ''
            ],
            [
                'port',
                null,
                InputOption::VALUE_OPTIONAL,
                'The port to serve the application on',
                ''
            ]
        ];
    }

    public function defHost() {

        return $defHost = $this->config->get('el.serve.url');
    }

    protected function defPort() {

        return $defHost = $this->config->get('el.serve.port');
    }
}
