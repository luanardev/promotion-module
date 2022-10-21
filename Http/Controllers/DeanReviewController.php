<?php

namespace Luanardev\Lumis\Promotion\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Exceptions\NotFoundException;
use Luanardev\Lumis\Promotion\Exceptions\StaffReviewException;

class DeanReviewController extends Controller
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
        
        return view('promotion::deanreview.index', [
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
            throw new StaffReviewException;
        }
        
        if($staff->isAcademic() || $staff->isResearch() ){
            return view('promotion::deanreview.academic', [
                'application' => $application,
                'staff' => $staff
            ]);
        }
    }

}
