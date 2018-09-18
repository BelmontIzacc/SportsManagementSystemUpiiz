<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

use App\User;
use App\informacion;
use App\taller;

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
        $tlista = \App\taller::lists('nombre','id');
        $tilista = \App\tipo::lists('nombre','id');
        return view('Admin.registro',[
        'index' => $index,
        'tlista' => $tlista,
        'tilista' => $tilista,
        ]);
    }
    
    public function postCoord(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'sexo' => 'required|min:1',
            'telefono' => 'required',
            'email' => 'required',
            'boleta' => 'required',
            'password' => 'required',
            'password2' => 'required',
            'taller' => 'required',
        ]);

        User::create([
            'nombre' =>$request->nombre,
            'apellidoPaterno' =>$request->apellidoPaterno,
            'apellidoMaterno' =>$request->apellidoMaterno,
            'email' => $request->email,
            'boleta' => $request->boleta,
            'password' => bcrypt($request->password),
            'tipo' => 3,
            'completado' => 1,
        ]);

        $opc_taller = $request->taller;
        $us = User::where('boleta',$request->boleta);

        if($opc_taller=='si'){
            $this->validate($request, [
                'tlista' => 'required|min:1',
            ]);

            $t =  taller::where('id',$request->tlista);
            $t->update([
                //'usuario_id' => $us->id,
            ]);

        }else if($opc_taller=='no'){
            $this->validate($request, [
                'nombreTaller' => 'required',
                'duracion' => 'required',
                'dia' => 'required',
                'lugar' => 'required',
                'tilista' => 'required',
                'Date1'=>'required',
                'Date2'=>'required',
            ]);
        }

        session()->flash('message', 'Alumno '.$us. ' actualizado correctamente '.$request->tlista);
        session()->flash('type', 'success');
        return redirect('/admin');
    }

    public function  registerStudio()
    {
        $index=4;
        $tilista = \App\tipo::lists('nombre','id');
        $coord = \App\User::where('tipo', 3)->get();
        return view('Admin.studio',[
            'index' => $index,
            'tilista' => $tilista,
            'coord' => $coord,
        ]);
    }
}
