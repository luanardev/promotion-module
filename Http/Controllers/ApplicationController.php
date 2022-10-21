<?php

namespace Luanardev\Lumis\Promotion\Http\Controllers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Luanardev\Lumis\Promotion\Entities\Application;
use Luanardev\Lumis\Promotion\Entities\PromotionValidator;
use Luanardev\Lumis\Promotion\Entities\PromotionCalendar;
use Luanardev\Lumis\Promotion\Exceptions\NotFoundException;
use Luanardev\Lumis\Promotion\Exceptions\PromotionClosedException;
use PDF;

class ApplicationController extends Controller
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
        return view('promotion::application.index', [
            'staff' => $staff
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $staff = auth()->user()->getStaff();

        $calendar = PromotionCalendar::getCurrent();

        if($calendar->isNotActive()){
            throw new PromotionClosedException;
        }

        if(empty($staff)){
            throw new NotFoundException;
        } 

        $validator = new PromotionValidator;
        $validator->validate($staff);
        
        return view('promotion::application.create', [
            'staff' => $staff
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     * @param Application $application
     * @return Renderable
     */
    public function show(Application $application)
    {
        if($application->isProcessing()){
            $calendar = PromotionCalendar::getCurrent();
            if($calendar->isNotActive()){
                throw new PromotionClosedException;
            }
        }
        
        $staff = auth()->user()->getStaff();

        if(empty($staff)){
            throw new NotFoundException;
        } 

        if( $staff->isAdministrative() || $staff->isCTS() ){
            return view('promotion::application.administrative', [
                'application' => $application,
                'staff' => $staff
            ]);
        }
        elseif($staff->isAcademic() || $staff->isResearch() ){
            return view('promotion::application.academic', [
                'application' => $application,
                'staff' => $staff
            ]);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     * @param Application $application
     * @return Renderable
     */
    public function delete(Application $application)
    {  
        $application->delete();
        return redirect()->route('promotion.application.index')->with('success', 'Application deleted');
    }

    /**
     * Show the form for creating a new resource.
     * @param Application $application
     * @return Renderable
     */
    public function download(Application $application)
    {  
        $staff = auth()->user()->getStaff();

        $name = Str::kebab($staff->name().'-'.$application->financial_year.'-promotion_form');

        if( $staff->isAdministrative() || $staff->isCTS() ){

            $pdf = PDF::loadView('promotion::application.pdf.administrative', [
                'application' => $application,
                'staff' => $staff
            ]);

            return $pdf->stream($name.'.pdf');
        }
        elseif($staff->isAcademic() || $staff->isResearch() ){

            $pdf = PDF::loadView('promotion::application.pdf.academic', [
                'application' => $application,
                'staff' => $staff
            ]);

            return $pdf->stream($name.'.pdf');
        }
       
    }

}
