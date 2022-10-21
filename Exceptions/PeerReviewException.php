<?php

namespace Luanardev\Lumis\Promotion\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

class PeerReviewException extends HttpException
{  
    public function __construct()
    {
        $message = 'Access Forbidden. User Cannot Conduct Peer Review';
        parent::__construct(403, $message, null, []);
    }
}
