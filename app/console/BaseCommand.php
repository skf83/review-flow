<?php

namespace app\console;

use GuzzleHttp\Client as HttpClient;

use Noodlehaus\Config;

use Psr\Container\{
    ContainerInterface
};

use Symfony\Component\Console\{
    Command\Command,
    Input\InputInterface,
    Output\OutputInterface
};

use Symfony\Component\EventDispatcher\EventDispatcher;

abstract class BaseCommand extends Command {

    protected $container;
    protected $client;
    protected $dispatcher;
    protected $config;
    protected $input;
    protected $output;
    protected $command;
    protected $description;

    public function __construct(ContainerInterface $container) {

        parent::__construct();

        $this->container    = $container;
        $this->client       = $container->get(HttpClient::class);
        $this->config       = $container->get(Config::class);
        $this->dispatcher   = $container->get(EventDispatcher::class);

        $this->setName($this->command);
        $this->setDescription($this->description);
    }

    protected function configure() {

        $this->setName($this->command)->setDescription($this->description);
        $this->addArguments();
        $this->addOptions();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $this->input    = $input;
        $this->output   = $output;

        return $this->handle($input, $output);
    }

    protected function argument($name) {

        return $this->input->getArgument($name);
    }

    protected function addArguments() {

        foreach ($this->arguments() as $argument) {

            $this->addArgument($argument[0], $argument[1], $argument[2]);
        }
    }

    protected function option($name) {

        return $this->input->getOption($name);
    }

    protected function addOptions() {

        foreach ($this->options() as $option) {

            $this->addOption($option[0], $option[1], $option[2], $option[3], $option[4]);
        }
    }

    protected function info($value) {

        return $this->output->writeln('<info>' . $value . '</info>');
    }

    protected function error($value) {

        return $this->output->writeln('<error>' . $value . '</error>');
    }
}