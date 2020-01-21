<?php

declare(strict_types=1);

namespace Game\Tests\service\Console;

use Game\Console\Initialiser;
use PHPUnit\Framework\TestCase;

class InitialiserTest extends TestCase
{
    public function testShouldSuccessfullyInstantiate(): void
    {
        $this->assertInstanceOf(Initialiser::class, Initialiser::create());
    }
}
