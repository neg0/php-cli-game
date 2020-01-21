<?php

declare(strict_types=1);

namespace Game\Tests\unit;

use Game\BeesInTrapOutcome;
use Game\Hive\Bee\AbstractBee;
use Game\Player\SinglePlayer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BeesInTrapOutcomeTest extends TestCase
{
    private BeesInTrapOutcome $sut;

    private MockObject $singlePlayer;

    private MockObject $targetBee;

    protected function setUp(): void
    {
        $this->singlePlayer = $this->createMock(SinglePlayer::class);
        $this->targetBee = $this->createMock(AbstractBee::class);

        $this->sut = new BeesInTrapOutcome(true, $this->singlePlayer);
    }

    public function testShouldHaveAStatusOfGameOver(): void
    {
        $this->assertTrue($this->sut->isGameOver());
    }

    public function testShouldBeAbleToSerialiseTheOutComeOfGameOverInString(): void
    {
        $this->singlePlayer
            ->expects($this->once())
            ->method('hitCount')
            ->willReturn(1)
        ;

        $this->assertStringContainsString('Game Over', (string) $this->sut);
    }

    public function testShouldBeAbleToSerialiseTheOutComeOfPointsInString(): void
    {
        $this->targetBee
            ->expects($this->exactly(2))
            ->method('hitsToDie')
            ->willReturn(13)
        ;

        $this->targetBee
            ->expects($this->once())
            ->method('name')
            ->willReturn('Queen bee')
        ;

        $this->targetBee
            ->expects($this->once())
            ->method('isQueen')
            ->willReturn(true)
        ;

        $this->targetBee
            ->expects($this->once())
            ->method('damagePoints')
            ->willReturn(6)
        ;

        $sut = new BeesInTrapOutcome(false, $this->singlePlayer);
        $sut->setTargetBee($this->targetBee);
        $sut->setBees($this->targetBee, $this->createMock(AbstractBee::class));

        $this->assertStringContainsString('Direct Hit', (string) $sut);
    }
}
