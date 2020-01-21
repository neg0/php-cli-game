<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Output;

class CommandOutput extends AbstractSymfonyCommandOutput
{
    public function __construct(CommandOutputInterface $output)
    {
        parent::__construct($output);
    }
}
