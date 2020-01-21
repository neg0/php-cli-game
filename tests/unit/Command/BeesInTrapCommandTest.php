<?php

declare(strict_types=1);

namespace Game\Tests\unit\Command;

use Game\Adapter\CLI\Command\IO\Input\CommandInputInterface;
use Game\Adapter\CLI\Command\IO\Output\CommandOutputInterface;
use Game\Adapter\CLI\Console\Plugin\QuestionPluginInterface;
use Game\BeesInTrap;
use Game\BeesInTrapOutcome;
use Game\Command\BeesInTrapCommand;
use Game\Player\Exception\HitDeadBeeException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BeesInTrapCommandTest extends TestCase
{
    private BeesInTrapCommand $sut;

    private MockObject $beesInTrap;

    private MockObject $questionHelper;

    private MockObject $input;

    private MockObject $output;

    private MockObject $beesInTrapOutcome;

    protected function setUp(): void
    {
        $this->beesInTrap = $this->createMock(BeesInTrap::class);
        $this->questionHelper = $this->createMock(QuestionPluginInterface::class);
        $this->beesInTrapOutcome = $this->createMock(BeesInTrapOutcome::class);

        $this->input = $this->createMock(CommandInputInterface::class);
        $this->output = $this->createMock(CommandOutputInterface::class);

        $this->sut = new BeesInTrapCommand(
            $this->beesInTrap,
            $this->questionHelper,
        );
    }

    public function testHitWhenInputIsNotAccepted(): void
    {
        $this->questionHelper
            ->expects($this->once())
            ->method('ask')
            ->willReturn('attack');
        ;

        $this->assertEquals(
            0,
            $this->sut->execute($this->input, $this->output)
        );
    }

    public function testHitWhenGameIsOver(): void
    {
        $this->questionHelper
            ->expects($this->once())
            ->method('ask')
            ->willReturn('hit');
        ;

        $this->beesInTrap
            ->expects($this->once())
            ->method('hit')
            ->willReturn($this->beesInTrapOutcome)
        ;

        $this->beesInTrapOutcome
            ->expects($this->once())
            ->method('__toString')
            ->willReturn("Game Over")
        ;

        $this->beesInTrapOutcome
            ->expects($this->once())
            ->method('isGameOver')
            ->willReturn(true)
        ;

        $this->assertEquals(
            0,
            $this->sut->execute($this->input, $this->output)
        );
    }

    public function testHitWhenExceptionThrown(): void
    {
        $this->questionHelper
            ->expects($this->once())
            ->method('ask')
            ->willReturn('hit');
        ;

        $this->beesInTrap
            ->expects($this->once())
            ->method('hit')
            ->willThrowException(new HitDeadBeeException());
        ;

        $this->assertEquals(
            1,
            $this->sut->execute($this->input, $this->output)
        );
    }
}
