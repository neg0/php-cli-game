<?php

declare(strict_types=1);

namespace Game\Tests\unit\Hive\Bee;

use Game\Hive\Bee\DroneBee;
use PHPUnit\Framework\TestCase;

class DroneBeeTest extends TestCase
{
    private DroneBee $sut;

    protected function setUp(): void
    {
        $this->sut = new DroneBee();
    }

    public function testShouldNotBeATypeQueen(): void
    {
        $this->assertFalse($this->sut->isQueen());
    }

    public function testShouldHaveANameForBee(): void
    {
        $this->assertEquals(DroneBee::NAME, $this->sut->name());
    }

    public function testShouldHaveADamagePointWhenGetsHit(): void
    {
        $this->assertEquals(DroneBee::DAMAGE_POINT, $this->sut->damagePoints());
    }
}
