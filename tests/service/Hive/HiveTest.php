<?php

declare(strict_types=1);

namespace Game\Tests\Service\Hive;

use Game\Hive\Bee\QueenBee;
use Game\Hive\Hive;
use PHPUnit\Framework\TestCase;

class HiveTest extends TestCase
{
    private Hive $sut;

    protected function setUp(): void
    {
        $this->sut = Hive::create();
    }

    public function testShouldHaveOnlyOneQueenBee(): void
    {
        $this->assertInstanceOf(QueenBee::class, $this->sut->getQueenBee());
    }

    public function testNumberOfWorkerBees(): void
    {
        $this->assertCount(5, $this->sut->getWorkerBees());
    }

    public function testNumberOfDroneBees(): void
    {
        $this->assertCount(8, $this->sut->getDroneBees());
    }
}
