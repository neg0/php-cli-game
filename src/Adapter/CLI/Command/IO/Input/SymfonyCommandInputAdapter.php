<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Input;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;

class SymfonyCommandInputAdapter implements CommandInputInterface, InputInterface
{
    private InputInterface $input;

    public function __construct(InputInterface $input)
    {
        $this->input = $input;
    }

    public function getFirstArgument(): ?string
    {
        return $this->input->getFirstArgument();
    }

    public function hasParameterOption($values, bool $onlyParams = false): bool
    {
        return $this->input->hasParameterOption($values, $onlyParams);
    }

    public function getParameterOption($values, $default = false, bool $onlyParams = false)
    {
        return $this->input->getParameterOption($values, $default, $onlyParams);
    }

    public function bind(InputDefinition $definition): void
    {
        $this->input->bind($definition);
    }

    public function validate(): void
    {
        $this->input->validate();
    }

    public function getArguments(): array
    {
        return $this->input->getArguments();
    }

    public function getArgument(string $name): string
    {
        return $this->input->getArgument($name);
    }

    public function setArgument(string $name, $value): self
    {
        $this->input->setArgument($name, $value);

        return $this;
    }

    public function hasArgument($name): bool
    {
        return $this->hasArgument($name);
    }

    public function getOptions(): array
    {
        return $this->input->getOptions();
    }

    public function getOption(string $name)
    {
        return $this->input->getOption($name);
    }

    public function setOption(string $name, $value): self
    {
        $this->input->setOption($name, $value);

        return $this;
    }

    public function hasOption(string $name): bool
    {
        return $this->input->hasOption($name);
    }

    public function isInteractive(): bool
    {
        return $this->input->isInteractive();
    }

    public function setInteractive(bool $interactive): self
    {
        $this->input->setInteractive($interactive);

        return $this;
    }
}
