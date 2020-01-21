<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Output;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SymfonyCommandOutputAdapter implements CommandOutputInterface, OutputInterface
{
    private OutputInterface $output;

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    public function print(string $message): void
    {
        $this->output->writeln($message);
    }

    public function write($messages, bool $newline = false, int $options = 0)
    {
        $this->output->write($messages, $newline, $options);
    }

    public function writeln($messages, int $options = 0)
    {
        $this->output->writeln($messages, $options);
    }

    public function setVerbosity(int $level): self
    {
        $this->output->setVerbosity($level);

        return $this;
    }

    public function getVerbosity(): int
    {
        return $this->output->getVerbosity();
    }

    public function isQuiet(): bool
    {
        return $this->output->isQuiet();
    }

    public function isVerbose(): bool
    {
        return $this->output->isVerbose();
    }

    public function isVeryVerbose(): bool
    {
        return $this->output->isVeryVerbose();
    }

    public function isDebug(): bool
    {
        return $this->output->isDebug();
    }

    public function setDecorated(bool $decorated): self
    {
        $this->setDecorated($decorated);

        return $this;
    }

    public function isDecorated(): bool
    {
        return $this->output->isDecorated();
    }

    public function setFormatter(OutputFormatterInterface $formatter): self
    {
        $this->output->setFormatter($formatter);

        return $this;
    }

    public function getFormatter(): OutputFormatterInterface
    {
        return $this->output->getFormatter();
    }
}
