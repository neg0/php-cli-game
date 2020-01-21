<?php

declare(strict_types=1);

namespace Game\Tests\unit\Hive\Bee;

use Game\Hive\Bee\WorkerBee;
use PHPUnit\Framework\TestCase;

class WorkerBeeTest extends TestCase
{
    private WorkerBee $sut;

    protected function setUp(): void
    {
        $this->sut = new WorkerBee();
    }

    public function testShouldNotBeATypeQueen(): void
    {
        $this->assertFalse($this->sut->isQueen());
    }

    public function testShouldHaveANameForBee(): void
    {
        $this->assertEquals(WorkerBee::NAME, $this->sut->name());
    }

    public function testShouldHaveADamagePointWhenGetsHit(): void
    {
        $this->assertEquals(WorkerBee::DAMAGE_POINT, $this->sut->damagePoints());
    }
}
