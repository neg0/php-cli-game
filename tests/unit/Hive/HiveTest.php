<?php

declare(strict_types=1);

namespace Game\Tests\unit\Hive;

use Game\Hive\Bee\DroneBee;
use Game\Hive\Bee\QueenBee;
use Game\Hive\Bee\WorkerBee;
use Game\Hive\Exception\InvalidNumberOfDroneBeesException;
use Game\Hive\Exception\InvalidNumberOfWorkerBeesException;
use Game\Hive\Hive;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class HiveTest extends TestCase
{
    private Hive $sut;

    private MockObject $queenBee;

    /**
     * @var MockObject[]
     */
    private array $droneBees;

    /**
     * @var MockObject[]
     */
    private array $workerBees;

    protected function setUp(): void
    {
        $this->queenBee = $this->createMock(QueenBee::class);

        for ($i = 0; $i < Hive::NUM_DRONE_BEES; $i++) {
            $this->droneBees[] = $this->createMock(DroneBee::class);
        }

        for ($i = 0; $i < Hive::NUM_WORKER_BEES; $i++) {
            $this->workerBees[] = $this->createMock(WorkerBee::class);
        }

        $this->sut = new Hive($this->queenBee, $this->droneBees, $this->workerBees);
    }

    public function testShouldHaveEightDroneBee(): void
    {
        $this->assertCount(Hive::NUM_DRONE_BEES, $this->sut->getDroneBees());
    }

    public function testShouldHaveFiveWorkerBee(): void
    {
        $this->assertCount(Hive::NUM_WORKER_BEES, $this->sut->getWorkerBees());
    }

    public function testShouldThrowAnExceptionWhenNumberOfDroneBeesAreNotEqualAllowedThreshold(): void
    {
        $droneBees = [$this->createMock(DroneBee::class)];

        $this->expectException(InvalidNumberOfDroneBeesException::class);
        $this->sut = new Hive($this->queenBee, $droneBees, $this->workerBees);
    }

    public function testShouldThrowAnExceptionWhenNumberOfWorkerBeesAreNotEqualAllowedThreshold(): void
    {
        $workerBees = [];

        $this->expectException(InvalidNumberOfWorkerBeesException::class);
        $this->sut = new Hive($this->queenBee, $this->droneBees, $workerBees);
    }
}
