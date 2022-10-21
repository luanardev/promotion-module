<?php

namespace Luanardev\Lumis\Promotion\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Luanardev\Lumis\Promotion\Exceptions\UserAccessException;
use Luanardev\Lumis\Promotion\Exceptions\PeerReviewException;
use Luanardev\Lumis\Promotion\Exceptions\StaffReviewException;
use Luanardev\Lumis\Promotion\Exceptions\NotFoundException;

class Promotion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $staff = auth()->user()->getStaff();

        if(empty($staff)){
            throw new NotFoundException;
        } 
        if($role == 'admin'){
            if(!auth()->user()->isAdmin()){
                throw new UserAccessException;
            }
        }
        elseif($role == 'peer'){
            if(!$staff->hasPeerAllocation()){
                throw new PeerReviewException;
            }          
        }
        elseif($role == 'appraiser'){
            if(!$staff->hasSubordinate()){
                throw new StaffReviewException;
            }
        }       
        return $next($request);
    }
}
