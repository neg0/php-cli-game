<?php

declare(strict_types=1);

namespace Game\Hive\Bee;

class DroneBee extends AbstractBee
{
    public const NAME = 'Drone bee';
    public const DAMAGE_POINT = 12;
    private const INITIAL_LIFESPAN = 50;

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
