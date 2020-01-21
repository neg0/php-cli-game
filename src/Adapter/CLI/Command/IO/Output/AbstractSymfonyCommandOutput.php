<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Output;

use Symfony\Component\Console\Output\Output;

abstract class AbstractSymfonyCommandOutput extends Output
{
    private CommandOutputInterface $output;

    protected function __construct(CommandOutputInterface $output)
    {
        $this->output = $output;
        parent::__construct(parent::VERBOSITY_NORMAL, false, null);
    }

    protected function doWrite(string $message, bool $newline)
    {
        $this->output->print($message);
    }
}
