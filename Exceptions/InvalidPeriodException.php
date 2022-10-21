<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidPeriodException extends HttpException
{  
    public function __construct()
    {
        $message = 'Access Forbidden. User Has Not Reached Minimum Period Of Service';
        parent::__construct(403, $message, null, []);
    }
}
