<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console;

use Game\Adapter\CLI\Command\CommandInterface;

class ConsoleOptions implements ConsoleInterface
{
    private string $name;

    private string $version;

    private CommandInterface $command;

    public function __construct(string $name, string $version, CommandInterface $command)
    {
        $this->name = $name;
        $this->version = $version;
        $this->command = $command;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getCommand(): CommandInterface
    {
        return $this->command;
    }
}
