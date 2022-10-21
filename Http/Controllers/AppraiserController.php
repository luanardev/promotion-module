<?php

namespace Luanardev\Lumis\Promotion\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Lumis\Promotion\Entities\Application;

class AppraiserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('promotion::appraiser.index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function setup(Application $application)
    {
        return view('promotion::appraiser.setup', [
            'application' => $application
        ]);
    }


}
