<?php

declare(strict_types=1);

namespace Game\Adapter\CLI\Command\IO\Input;

use Symfony\Component\Console\Input\Input;

abstract class AbstractSymfonyCommandInput extends Input
{
    private CommandInputInterface $input;

    protected function __construct(CommandInputInterface $input)
    {
        $this->input = $input;
        parent::__construct();
    }

    protected function parse()
    {
        return $this->parse();
    }

    public function getFirstArgument()
    {
        return $this->getFirstArgument();
    }

    public function hasParameterOption($values, bool $onlyParams = false)
    {
        return $this->hasParameterOption($values, $onlyParams);
    }

    public function getParameterOption($values, $default = false, bool $onlyParams = false)
    {
        return $this->getParameterOption($values, $default, $onlyParams);
    }
}
