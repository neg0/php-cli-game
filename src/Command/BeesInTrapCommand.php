<?php

declare(strict_types=1);

namespace Game\Command;

use Game\Adapter\CLI\Command\CommandInterface;
use Game\Adapter\CLI\Command\IO\Input\CommandInputInterface;
use Game\Adapter\CLI\Command\IO\Output\CommandOutputInterface;
use Game\Adapter\CLI\Console\Plugin\QuestionPluginInterface;
use Game\BeesInTrap;

class BeesInTrapCommand implements CommandInterface
{
    public const NAME = 'game:bees-in-trap';

    private BeesInTrap $beesInTrap;

    private QuestionPluginInterface $questionHelper;

    public function __construct(
        BeesInTrap $beesInTrap,
        QuestionPluginInterface $questionHelper
    ) {
        $this->beesInTrap = $beesInTrap;
        $this->questionHelper = $questionHelper;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDescription(): string
    {
        return 'Bees In Trap Game';
    }

    public function execute(
        CommandInputInterface $input,
        CommandOutputInterface $output
    ): int {
        do {
            $hit = $this->questionHelper->ask(
                $input,
                $output,
                '<question>Please type `hit` and press the return key:</question>',
                'hit'
            );
            if ($hit !== 'hit') {
                $output->print(sprintf(
                    '<info>You have entered `%s`, please enter `hit` to leave blank as default</info>',
                    $hit
                ));
                continue;
            }

            try {
                $hitOutcome = $this->beesInTrap->hit();
                $output->print((string) $hitOutcome);

                $isGameOver = $hitOutcome->isGameOver();
            } catch (\Throwable $exception) {
                $output->print($exception->getMessage());
                return 1;
            }
        } while (false === $isGameOver);

        return 0;
    }
}
