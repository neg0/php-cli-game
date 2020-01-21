<?php

declare(strict_types=1);

namespace Game\Hive\Bee;

abstract class AbstractBee
{
    protected int $lifeSpan;

    abstract public function name(): string;

    abstract public function damagePoints(): int;

    public function deductLife(): AbstractBee
    {
        if (!$this->isDead()) {
            $this->lifeSpan = $this->lifeSpan - $this->damagePoints();
            if ($this->lifeSpan < 0) {
                $this->lifeSpan = 0;
            }
        }

        return $this;
    }

    public function hitsToDie(): int
    {
        if ($this->isDead()) {
            return 0;
        }

        return (int) ceil($this->lifeSpan / $this->damagePoints());
    }

    public function isDead(): bool
    {
        return 0 === $this->lifeSpan;
    }

    public function isQueen(): bool
    {
        return false;
    }
}
