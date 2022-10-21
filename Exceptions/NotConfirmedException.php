<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class NotConfirmedException extends HttpException
{  
    public function __construct()
    {
        $message = 'Access Forbidden. User Is Not A Confirmed Staff Member';
        parent::__construct(403, $message, null, []);
    }
}
