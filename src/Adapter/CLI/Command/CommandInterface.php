<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command;

use Game\Adapter\CLI\Command\IO\Input\CommandInputInterface;
use Game\Adapter\CLI\Command\IO\Output\CommandOutputInterface;

interface CommandInterface
{
    public function getName(): string;

    public function getDescription(): string;

    public function execute(
        CommandInputInterface $input,
        CommandOutputInterface $output
    ): int;
}
