<?php

declare(strict_types=1);

namespace Game\Tests\unit;

use Game\BeesInTrap;
use Game\Hive\Bee\DroneBee;
use Game\Hive\Bee\QueenBee;
use Game\Hive\Hive;
use Game\Player\SinglePlayer;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BeesInTrapTest extends TestCase
{
    private BeesInTrap $sut;

    private MockObject $singlePlayer;

    private MockObject $hive;

    private MockObject $queenBee;

    /**
     * @var MockObject[]
     */
    private array $droneBees;

    protected function setUp(): void
    {
        $this->singlePlayer = $this->createMock(SinglePlayer::class);
        $this->hive = $this->createMock(Hive::class);

        $this->queenBee = $this->createMock(QueenBee::class);
        $this->droneBees[] = $this->createMock(DroneBee::class);

        $this->hive
            ->expects($this->once())
            ->method('getQueenBee')
            ->willReturn($this->queenBee)
        ;

        $this->hive
            ->expects($this->once())
            ->method('getDroneBees')
            ->willReturn($this->droneBees)
        ;

        $this->sut = new BeesInTrap($this->singlePlayer, $this->hive);
    }

    public function testShouldSuccessfullyHitGameIsNotOver(): void
    {
        $this->singlePlayer
            ->method('hit')
            ->willReturn($this->queenBee);

        $this->queenBee
            ->method('isQueen')
            ->willReturn(true);

        $this->queenBee
            ->method('isDead')
            ->willReturn(false);

        $this->sut->hit();

        $this->assertFalse($this->sut->hit()->isGameOver());
    }

    public function testShouldHitAndKillQueenBeeSuccessfullyToGetGameOverStatus(): void
    {
        $this->singlePlayer
            ->method('hit')
            ->willReturn($this->queenBee);

        $this->queenBee
            ->method('isQueen')
            ->willReturn(true);

        $this->queenBee
            ->method('isDead')
            ->willReturn(true);

        $this->sut->hit();

        $this->assertTrue($this->sut->hit()->isGameOver());
    }
}
