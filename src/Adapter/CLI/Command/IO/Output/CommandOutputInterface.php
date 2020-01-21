<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Output;

interface CommandOutputInterface
{
    public function print(string $message): void;
}
