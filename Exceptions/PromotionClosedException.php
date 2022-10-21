<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PromotionClosedException extends HttpException
{  
    public function __construct()
    {
        $message = 'Access Forbidden. Promotion Period Closed';
        parent::__construct(403, $message, null, []);
    }
}
