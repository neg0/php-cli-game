<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console;

class Console extends AbstractSymfonyConsole
{
    public function __construct(ConsoleInterface $console)
    {
        parent::__construct($console);
    }
}
