<?php

declare(strict_types=1);

namespace Game\Hive\Exception;

use Game\Hive\Bee\DroneBee;
use Game\Hive\Hive;

class InvalidNumberOfDroneBeesException extends \Exception
{
    private const MSG = 'number of %s in Hive should be %f';

    public function __construct()
    {
        parent::__construct(sprintf(self::MSG, DroneBee::NAME, Hive::NUM_DRONE_BEES), 400, null);
    }
}
