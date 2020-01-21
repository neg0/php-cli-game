<?php

declare(strict_types=1);

namespace Game\Tests\service;

use Game\BeesInTrap;
use Game\BeesInTrapOutcome;
use PHPUnit\Framework\TestCase;

class BeesInTrapTest extends TestCase
{
    private BeesInTrap $sut;

    protected function setUp(): void
    {
        $this->sut = BeesInTrap::create();
    }

    public function testShouldReturnAnOutcomeOfHitToTheHiveToDamageOneOfTheBees(): void
    {
        $this->assertInstanceOf(BeesInTrapOutcome::class, $this->sut->hit());
    }
}
