<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console\Plugin;

use Game\Adapter\CLI\Command\IO\Input\CommandInput;
use Game\Adapter\CLI\Command\IO\Input\CommandInputInterface;
use Game\Adapter\CLI\Command\IO\Output\CommandOutput;
use Game\Adapter\CLI\Command\IO\Output\CommandOutputInterface;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Question\Question as SymfonyQuestion;

class Question implements QuestionPluginInterface
{
    private QuestionHelper $questionHelper;

    public function __construct(QuestionHelper $questionHelper)
    {
        $this->questionHelper = $questionHelper;
    }

    public function ask(
        CommandInputInterface $input,
        CommandOutputInterface $output,
        string $question,
        ?string $defaultAnswer
    ) {
        return $this->questionHelper->ask(
            new CommandInput($input),
            new CommandOutput($output),
            new SymfonyQuestion($question, $defaultAnswer),
        );
    }
}
