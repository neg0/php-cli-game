<?php

declare(strict_types=1);

namespace Game;

use Game\Hive\Exception\InvalidNumberOfDroneBeesException;
use Game\Hive\Exception\InvalidNumberOfWorkerBeesException;
use Game\Player\Exception\HitDeadBeeException;
use Game\Hive\Bee\AbstractBee;
use Game\Hive\Hive;
use Game\Player\SinglePlayer;

class BeesInTrap
{
    private SinglePlayer $player;

    /**
     * @var AbstractBee[]
     */
    private array $bees;

    public function __construct(SinglePlayer $player, Hive $hive)
    {
        $this->player = $player;
        $this->bees = [
             $hive->getQueenBee(),
            ...$hive->getDroneBees(),
            ...$hive->getWorkerBees(),
        ];
    }

    /**
     * @throws InvalidNumberOfDroneBeesException
     * @throws InvalidNumberOfWorkerBeesException
     */
    public static function create(): self
    {
        return new self(new SinglePlayer(), Hive::create());
    }

    /**
     * @throws HitDeadBeeException
     */
    public function hit(): BeesInTrapOutcome
    {
        $outcome = new BeesInTrapOutcome(false, $this->player);
        $outcome->setBees(...$this->bees);

        do {
            $randomIndex = mt_rand(0, count($this->bees) - 1);
            $bee = $this->bees[$randomIndex];
            $isRandomBeeDead = $bee->isDead();

            if (!$isRandomBeeDead) {
                $isRandomBeeDead = false;

                $bee = $this->player->hit($bee);
                $outcome->setTargetBee($bee);

                if ($bee->isQueen() && $bee->isDead()) {
                    return new BeesInTrapOutcome(true, $this->player);
                }
            }
        } while (true === $isRandomBeeDead);

        return $outcome;
    }
}
