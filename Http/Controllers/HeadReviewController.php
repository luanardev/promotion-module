<?php

namespace Luanardev\Lumis\Promotion\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Exceptions\NotFoundException;
use Luanardev\Lumis\Promotion\Exceptions\StaffReviewException;

class HeadReviewController extends Controller
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

        if(!$staff->hasSubordinate()){
            throw new StaffReviewException;
        }
        
        return view('promotion::headreview.index', [
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
        
        if( $staff->isAdministrative() || $staff->isCTS() ){
            return view('promotion::headreview.administrative', [
                'application' => $application,
                'staff' => $staff
            ]);
        }
        elseif($staff->isAcademic() || $staff->isResearch() ){
            return view('promotion::headreview.academic', [
                'application' => $application,
                'staff' => $staff
            ]);
        }
    }

}
