<?php

declare(strict_types=1);

namespace Game\Tests\unit\Hive\Bee;

use Game\Hive\Bee\QueenBee;
use PHPUnit\Framework\TestCase;

class QueenBeeTest extends TestCase
{
    private QueenBee $sut;

    protected function setUp(): void
    {
        $this->sut = new QueenBee();
    }

    public function testShouldNotBeDead(): void
    {
        $this->assertFalse($this->sut->isDead());
    }

    public function testShouldHaveATypeQueen(): void
    {
        $this->assertTrue($this->sut->isQueen());
    }

    public function testShouldHaveANameForBee(): void
    {
        $this->assertEquals(QueenBee::NAME, $this->sut->name());
    }

    public function testShouldHaveADamagePointWhenGetsHit(): void
    {
        $this->assertEquals(QueenBee::DAMAGE_POINT, $this->sut->damagePoints());
    }

    public function testShouldHaveNumberOfHitsCanEndure(): void
    {
        $this->assertEquals(13, $this->sut->hitsToDie());
    }

    public function testWhenLifeTimeReducedByNumberOfHitsToDieShouldHaveNoHitsToDie(): void
    {
        do {
            $this->sut->deductLife();
            $isDead = $this->sut->isDead();
        } while (false === $isDead);

        $this->assertEquals(0, $this->sut->hitsToDie());
    }
}
