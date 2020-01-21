<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Input;

class CommandInput extends AbstractSymfonyCommandInput
{
    public function __construct(CommandInputInterface $input)
    {
        parent::__construct($input);
    }
}
