<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command;

class Command extends AbstractSymfonyCommand
{
    public function __construct(CommandInterface $command)
    {
        parent::__construct($command);
    }
}
