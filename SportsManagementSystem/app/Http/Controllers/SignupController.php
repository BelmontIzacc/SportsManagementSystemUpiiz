<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\informacion;

class SignupController extends Controller
{
     public function __construct()
    {}
    
    public function index()
    {
        $index=1;
        return view('User.start',[
        'index' => $index
        ]);
    }
    
    public function getRegister(){
        $index = 4;
        return view('Registro.RegistroUsuario', ['index'=>$index]);
    }
    
    public function postRegister(Request $request){
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'email' => 'required',
            'boleta' => 'required',
            'contraseña' => 'required',
            'verContra' => 'required|same:contraseña',
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
            'permisos' => 0,
        ]);
        
        session()->flash('message', 'Alumno '. $request->boleta. ' actualizado correctamente '.$request->nombre);
        session()->flash('type', 'success');   
        return redirect('/registro/InfoCompleta');
          
    }
   
    
    public function getCompleto(){
        
        $index=4;
        $tlista = \App\carrera::where('id','<=',5)->lists('nombre','id');
        $tlistac = \App\carrera::where('id','>',5)->lists('nombre','id');
        
        $boleta = \App\User::where('tipo', 2 )->lists('boleta','id');
             
             
        return view('Registro.infoCompleta',[
        'index' => $index,
        'tlista' => $tlista,
        'tlistac' => $tlistac,
            
        ]);
        
    }
    
    public function postCompleto(Request $request){
        $this->validate($request, [
            'sexo' => 'required',
            'edad' => 'required',
            
            'calle' => 'required',
            'ext' => 'required',
            'inter' => 'required',
            'colonia' => 'required',
            'cp' => 'required',
            
            'insti' => 'required',
        ]); 
        
        return redirect('/user');
          
    }
}
