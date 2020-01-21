<?php

declare(strict_types=1);

namespace Game\Hive\Bee;

class QueenBee extends AbstractBee
{
    public const NAME = 'Queen bee';
    public const DAMAGE_POINT = 8;
    private const INITIAL_LIFESPAN = 100;

    public function __construct()
    {
        $this->lifeSpan = self::INITIAL_LIFESPAN;
    }

    public function name(): string
    {
        return self::NAME;
    }

    public function damagePoints(): int
    {
        return self::DAMAGE_POINT;
    }

    public function isQueen(): bool
    {
        return true;
    }
}
