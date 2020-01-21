<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Console\Plugin;

use Game\Adapter\CLI\Command\IO\Input\CommandInputInterface;
use Game\Adapter\CLI\Command\IO\Output\CommandOutputInterface;

interface QuestionPluginInterface
{
    public function ask(
        CommandInputInterface $input,
        CommandOutputInterface $output,
        string $question,
        ?string $defaultAnswer
    );
}
