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
        $user = Auth::user();
        return view('User.start',[
        'index' => $index,
        'user' => $user,
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
    public function getProfile()
    {
        $index=1;
        $user = Auth::user();
        return view('User.perfil',[
            'index' => $index,
            'user' => $user
        ]);
    }
    
    
    public function getInfo()
    {
        $index=1;
        $user = Auth::user();
        $info = \App\informacion::where('id_usuario','==', $user->id);
        
        return view('User.informacion',[
            'index' => $index,
            'user' => $user,
            'info'=> $info
        ]);
    }
    
    public function getSearch()
    {
        $index=1;
        return view('User.search',[
            'index' => $index,
        ]);
    }
    public function postSearch(Request $request){
        $index = 1;

        switch($request->opc){
            case 2:
                $this->validate($request, [
                    'busqueda' => 'required'
                ]);
                
                //$taller = \App\taller::where('nombre', $request->busqueda)->get();
                $taller = \App\taller::where('nombre','like','%'.$request->busqueda.'%')->get();
                //error_log($taller);
                
                if(count($taller) == 0) {
                    session()->flash('message', 'No se encontro ningun registro con el nombre: '.$request->busqueda);
                    session()->flash('type', 'danger');
                }
                return view('User.search', ['index'=>$index, 'taller'=>$taller]);
                break;
        }
    
    }
    
    public function showTaller($id)
    {
        $index = 1;
        $taller = \App\taller::find($id);

       
        return view('User.taller', [
            'index'=>$index,
            'taller'=>$taller
        ]);
    }
}
