<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

class CoordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('coord');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index=1;
        $taller = \App\taller::where('usuario_id',Auth::user()->id)->get();

        return view('Coord.start',[
            'index' => $index,
            'taller'=>$taller,
        ]);
    }

    public function index2()
    {
        $index=1;
        $taller = \App\inscripcion::where('usuario_id',Auth::user()->id)->get();

        return view('Coord.start_user',[
            'index' => $index,
            'taller'=>$taller,
        ]);
    }

    public function indexPost(Request $request)
    {
        $value = $request->stats;
        if($value == 0){ // vista usuario
            session()->flash('message', 'Menu de Usuario');
            session()->flash('type', 'info');

            return redirect('/coord/User');
        }else if($value == 1){ //vista coordinador
            session()->flash('message', 'Menu de Coordinador');
            session()->flash('type', 'info');

            return redirect('/coord');
        }
    }
}
