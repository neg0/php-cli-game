<?php

declare(strict_types=1);

namespace Game\Hive\Bee;

class WorkerBee extends AbstractBee
{
    public const NAME = 'Worker bee';
    public const DAMAGE_POINT = 10;
    private const INITIAL_LIFESPAN = 75;

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
}
