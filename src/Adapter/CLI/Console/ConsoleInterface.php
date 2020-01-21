<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console;

use Game\Adapter\CLI\Command\CommandInterface;

interface ConsoleInterface
{
    public function getName(): string;

    public function getVersion(): string;

    public function getCommand(): CommandInterface;
}
