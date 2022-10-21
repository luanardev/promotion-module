<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class NotPermanentException extends HttpException
{  
    public function __construct()
    {
        $message = 'Access Forbidden. User Is Not A Permanent Staff Member';
        parent::__construct(403, $message, null, []);
    }
}
