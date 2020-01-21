<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console;

use Game\Adapter\CLI\Command\Command;
use Symfony\Component\Console\Application;

abstract class AbstractSymfonyConsole extends Application
{
    protected function __construct(ConsoleInterface $console)
    {
        parent::__construct($console->getName(), $console->getVersion());

        parent::add(new Command($console->getCommand()));
        parent::setDefaultCommand($console->getCommand()->getName(), true);
    }
}
