<?php

declare(strict_types=1);

namespace Game\Hive;

use Game\Hive\Bee\DroneBee;
use Game\Hive\Bee\QueenBee;
use Game\Hive\Bee\WorkerBee;
use Game\Hive\Exception\InvalidNumberOfDroneBeesException;
use Game\Hive\Exception\InvalidNumberOfWorkerBeesException;

class Hive
{
    public const NUM_DRONE_BEES = 8;
    public const NUM_WORKER_BEES = 5;

    private QueenBee $queenBee;

    /**
     * @var DroneBee[]
     */
    private array $droneBees;

    /**
     * @var WorkerBee[]
     */
    private array $workerBees;


    /**
     * @throws InvalidNumberOfDroneBeesException
     * @throws InvalidNumberOfWorkerBeesException
     */
    public function __construct(QueenBee $queenBee, array $droneBees, array $workerBees)
    {
        if (count($droneBees) !== self::NUM_DRONE_BEES) {
            throw new InvalidNumberOfDroneBeesException();
        }

        if (count($workerBees) !== self::NUM_WORKER_BEES) {
            throw new InvalidNumberOfWorkerBeesException();
        }

        $this->queenBee = $queenBee;
        $this->droneBees = $droneBees;
        $this->workerBees = $workerBees;
    }

    /**
     * @throws InvalidNumberOfDroneBeesException
     * @throws InvalidNumberOfWorkerBeesException
     */
    public static function create(): self
    {
        $droneBees = array();
        for ($i = 0; $i < self::NUM_DRONE_BEES; $i++) {
            $droneBees[] = new DroneBee();
        }

        $workerBees = array();
        for ($i = 0; $i < self::NUM_WORKER_BEES; $i++) {
            $workerBees[] = new WorkerBee();
        }

        return new self(
            new QueenBee(),
            $droneBees,
            $workerBees,
        );
    }

    public function getQueenBee(): QueenBee
    {
        return $this->queenBee;
    }

    /**
     * @return DroneBee[]
     */
    public function getDroneBees(): array
    {
        return $this->droneBees;
    }

    /**
     * @return WorkerBee[]
     */
    public function getWorkerBees(): array
    {
        return $this->workerBees;
    }
}
