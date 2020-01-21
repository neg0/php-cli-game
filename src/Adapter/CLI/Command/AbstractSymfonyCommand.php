<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command;

use Game\Adapter\CLI\Command\IO\Input\SymfonyCommandInputAdapter;
use Game\Adapter\CLI\Command\IO\Output\SymfonyCommandOutputAdapter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractSymfonyCommand extends Command
{
    private CommandInterface $command;

    protected function __construct(CommandInterface $command)
    {
        parent::__construct();

        $this->command = $command;

        $this->setName($this->command->getName());
        $this->setDescription($this->command->getDescription());
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        return $this->command->execute(
            new SymfonyCommandInputAdapter($input),
            new SymfonyCommandOutputAdapter($output),
        );
    }
}
