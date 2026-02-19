<?php

namespace app\console;

use app\console\commands\{
    DisplayAppModeCommand,
    generators\ConsoleGeneratorCommand,
    generators\ControllerGeneratorCommand,
    generators\DataModelGeneratorCommand,
    locales\ActivateLocaleCommand,
    locales\AddLocaleCommand,
    locales\DeactivateLocaleCommand,
    locales\ListLocalesCommand,
    migrations\Create,
    migrations\Migrate,
    migrations\Rollback,
    migrations\SeedCreate,
    migrations\SeedRun,
    migrations\Status,
    monitor\AddEndpointCommand,
    monitor\RemoveEndpointCommand,
    monitor\Run,
    monitor\StatusCommand,
    monitor\UpdateFrequencyCommand,
    SayHelloCommand,
    StartServerCommand
};

class Kernel {

    /**
     * Tasks
     *
     * @var array
     */
    protected $tasks = [];

    /**
     * Commands
     *
     * @var array
     */
    protected array $commands = [

        /* APPLICATION */
        DisplayAppModeCommand::class,
        SayHelloCommand::class,
        StartServerCommand::class,
        /* LOCALES */
        ActivateLocaleCommand::class,
        AddLocaleCommand::class,
        DeactivateLocaleCommand::class,
        ListLocalesCommand::class,
        /* MIGRATIONS */
        Create::class,
        Migrate::class,
        Rollback::class,
        SeedCreate::class,
        SeedRun::class,
        Status::class,
        /* MAKE */
        ConsoleGeneratorCommand::class,
        ControllerGeneratorCommand::class,
        DataModelGeneratorCommand::class,
        /* MONITOR */
        Run::class,
        StatusCommand::class,
        AddEndpointCommand::class,
        RemoveEndpointCommand::class,
        UpdateFrequencyCommand::class,

    ];

    public function getCommands() {

        return $this->commands;
    }
}