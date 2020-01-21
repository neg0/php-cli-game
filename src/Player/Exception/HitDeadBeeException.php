<?php

declare(strict_types=1);

namespace Game\Player\Exception;

class HitDeadBeeException extends \Exception
{
    private const MSG = 'Player can not hit a dead bee';

    public function __construct()
    {
        parent::__construct(self::MSG, 400, null);
    }
}
