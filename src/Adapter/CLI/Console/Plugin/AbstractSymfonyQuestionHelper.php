<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console\Plugin;

use Game\Adapter\CLI\Command\IO\Input\SymfonyCommandInputAdapter;
use Game\Adapter\CLI\Command\IO\Output\SymfonyCommandOutputAdapter;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

abstract class AbstractSymfonyQuestionHelper extends QuestionHelper
{
    private QuestionPluginInterface $plugin;

    protected function __construct(QuestionPluginInterface $plugin)
    {
        $this->plugin = $plugin;
    }

    public function ask(InputInterface $input, OutputInterface $output, Question $question)
    {
        return $this->plugin->ask(
            new SymfonyCommandInputAdapter($input),
            new SymfonyCommandOutputAdapter($output),
            $question->getQuestion(),
        );
    }
}
