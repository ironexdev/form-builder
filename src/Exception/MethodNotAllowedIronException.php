<?php

namespace Ironex\Exception;

use Exception;

class MethodNotAllowedIronException extends Exception
{
    public function __construct()
    {
        parent::__construct("Method Not Allowed", 405);
    }
}