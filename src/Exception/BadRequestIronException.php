<?php

namespace Ironex\Exception;

use Exception;

class BadRequestIronException extends Exception
{
    public function __construct()
    {
        parent::__construct("Bad Request", 400);
    }
}