<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index=1;
        return view('User.start',[
        'index' => $index
        ]);
    }
    public function getRegister(){
        $index = 4;
        return view('User.RegistroUsuario', ['index'=>$index]);
    }
    public function postRegister(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'e-mail' => 'required',
            'boleta' => 'required',
            'contraseña' => 'required',
            'verContra' => 'required',
        ]);

        if($request->contraseña == $request->verContra){
            session()->flash('type', 'success');
            return redirect('/user/InfoCompleta');      
        }
        session()->flash('type', 'error');
        return redirect('#');   
    }
    
    public function getCompleto(){
         {
        $index=4;
        $tlista = \App\carrera::lists('nombre','id');
        return view('User.infoCompleta',[
        'index' => $index,
        'tlista' => $tlista,
        ]);
        }
    }
    
    public function postCompleto(Request $request){ //aun no elavorado 
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'e-mail' => 'required',
            'boleta' => 'required',
            'contraseña' => 'required',
            'verContra' => 'required',
        ]);

        if($request->contraseña == $request->verContra){
            session()->flash('type', 'success');
            return redirect('/user/RegistroCompleto');      
        }
        session()->flash('type', 'error');
        return redirect('#');   
    }
}
