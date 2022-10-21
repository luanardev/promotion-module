<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class UserAccessException extends HttpException
{  
    public function __construct()
    {
        $message = 'User does not have Administrative access.';
        parent::__construct(403, $message, null, []);
    }
}
