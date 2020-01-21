<?php

declare(strict_types=1);

namespace Game\Player;

use Game\Hive\Bee\AbstractBee;
use Game\Player\Exception\HitDeadBeeException;

class SinglePlayer
{
    private int $hitCount = 0;

    /**
     * @throws HitDeadBeeException
     */
    public function hit(AbstractBee $bee): AbstractBee
    {
        if ($bee->isDead()) {
            throw new HitDeadBeeException();
        }

        $bee->deductLife();
        $this->hitCount++;

        return $bee;
    }

    public function hitCount(): int
    {
        return $this->hitCount;
    }
}
