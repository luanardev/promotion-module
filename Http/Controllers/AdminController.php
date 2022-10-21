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

class AdminController extends Controller
{ 
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function applications()
    {
        $staff = auth()->user()->getStaff();

        if(empty($staff)){
            throw new NotFoundException;
        } 
        return view('promotion::admin.applications');
    }
}
