<?php

declare(strict_types=1);

namespace Game;

use Game\Hive\Bee\AbstractBee;
use Game\Player\SinglePlayer;

class BeesInTrapOutcome
{
    private SinglePlayer $singlePlayer;

    private bool $gameOver;

    /**
     * @var AbstractBee[]
     */
    private array $bees;

    private ?AbstractBee $targetBee;

    public function __construct(bool $gameOver, SinglePlayer $singlePlayer)
    {
        $this->singlePlayer = $singlePlayer;
        $this->gameOver = $gameOver;
    }

    public function isGameOver(): bool
    {
        return $this->gameOver;
    }

    public function setTargetBee(AbstractBee $targetBee): self
    {
        $this->targetBee = $targetBee;

        return $this;
    }

    public function setBees(AbstractBee ...$bees): self
    {
        $this->bees = $bees;

        return  $this;
    }

    public function __toString(): string
    {
        if ($this->gameOver) {
            return sprintf(
                'Game Over - Queen bee is dead! Hive is destroyed with total of %d hits',
                $this->singlePlayer->hitCount(),
            );
        }

        $remainingHits = 0;
        $remainingHitsQueen = 0;
        foreach ($this->bees as $key => $bee) {
            $remainingHits += $bee->hitsToDie();
            if ($bee->isQueen()) {
                $remainingHitsQueen += $bee->hitsToDie();
            }
        }

        return  sprintf(
            'Direct Hit. You took %d points from %s. To kill all: %d or %d to kill the queen.',
            $this->targetBee->damagePoints(),
            $this->targetBee->name(),
            $remainingHits,
            $remainingHitsQueen,
        );
    }
}
