<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index=1;
        return view('Admin.start',[
        'index' => $index,
        ]);
    }

    public function registerCoord()
    {
        $index=4;
        return view('Admin.registro',[
        'index' => $index,
        ]);
    }
    
    public function  registerStudio()
    {
        $index=4;
        return view('Admin.studio',[
            'index' => $index,
        ]);
    }
}
