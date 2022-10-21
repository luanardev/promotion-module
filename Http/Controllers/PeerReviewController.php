<?php

namespace Luanardev\Lumis\Promotion\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Exceptions\NotFoundException;
use Luanardev\Lumis\Promotion\Exceptions\PeerReviewException;

class PeerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $staff = auth()->user()->getStaff();

        if(empty($staff)){
            throw new NotFoundException;
        }

        if(!$staff->hasPeerAllocation()){
            throw new PeerReviewException;
        }

        return view('promotion::peerreview.index', [
            'staff' => $staff
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function review(Application $application)
    {
        $staff = auth()->user()->getStaff();

        if(empty($staff)){
            throw new NotFoundException;
        }

        if(!$staff->canReviewPromotion($application)){
            throw new PeerReviewException;
        }

        return view('promotion::peerreview.review', [
            'application' => $application
        ]);
        
    }

}
