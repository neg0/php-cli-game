<?php

declare(strict_types=1);

namespace Game\Console;

use Game\Adapter\CLI\Command\CommandInterface;
use Game\Adapter\CLI\Console\Console;
use Game\Adapter\CLI\Console\ConsoleOptions;
use Game\Adapter\CLI\Console\Plugin\Question;
use Game\BeesInTrap;
use Game\Command\BeesInTrapCommand;
use Symfony\Component\Console\Helper\QuestionHelper;

class Initialiser extends Console
{
    public function __construct(CommandInterface $command)
    {
        $consoleOptions = new ConsoleOptions(
            getenv('APP_NAME') ? getenv('APP_NAME') : 'GameConsole',
            getenv('APP_VERSION') ? getenv('APP_VERSION') : '1.0.0',
            $command,
        );

        parent::__construct($consoleOptions);
    }

    public static function create(): self
    {
        $command = new BeesInTrapCommand(
            BeesInTrap::create(),
            new Question(new QuestionHelper()),
        );

        return new self($command);
    }

    public function boot(): int
    {
        return parent::run();
    }
}
