<?php

declare(strict_types=1);

namespace Game\Tests\unit\Player;

use Game\Hive\Bee\AbstractBee;
use Game\Player\Exception\HitDeadBeeException;
use Game\Player\SinglePlayer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SinglePlayerTest extends TestCase
{
    private SinglePlayer $sut;

    private MockObject $bee;

    protected function setUp(): void
    {
        $this->bee = $this->createMock(AbstractBee::class);
        $this->sut = new SinglePlayer();
    }

    public function testWhenInstantiatedShouldHaveHitCountsOfZero(): void
    {
        $this->assertEquals(0, $this->sut->hitCount());
    }

    public function testWhenPlayerHitsABeeHitCountsShouldIncrementByOne(): void
    {
        $this->bee
            ->expects($this->once())
            ->method('isDead')
            ->willReturn(false);

        $this->bee
            ->expects($this->once())
            ->method('deductLife')
            ->willReturn($this->bee);

        $this->sut->hit($this->bee);

        $this->assertEquals(1, $this->sut->hitCount());
    }

    public function testWhenPlayerHitsABeeTwiceHitCountsShouldIncrementByTwo(): void
    {
        $this->bee
            ->expects($this->exactly(2))
            ->method('isDead')
            ->willReturn(false);

        $this->bee
            ->expects($this->exactly(2))
            ->method('deductLife')
            ->willReturn($this->bee);

        $this->sut->hit($this->bee);
        $this->sut->hit($this->bee);

        $this->assertEquals(2, $this->sut->hitCount());
    }

    public function testWhenPlayerTriesToHitsADeadBeeHitCountsShouldThrowAnException(): void
    {
        $this->bee
            ->expects($this->once())
            ->method('isDead')
            ->willReturn(true);


        $this->expectException(HitDeadBeeException::class);
        $this->sut->hit($this->bee);
    }

    public function testWhenPlayerTriesToHitsADeadBeeHitCountsShouldNotIncrement(): void
    {
        $this->bee
            ->expects($this->once())
            ->method('isDead')
            ->willReturn(true);

        try {
            $this->sut->hit($this->bee);
        } catch (\Exception $exception) {
        }

        $this->assertEquals(0, $this->sut->hitCount());
    }
}
