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

   
    
    public function getCompleto($B){
        
        $index=4;
        $tlista = \App\carrera::where('id','<=',5)->lists('nombre','id');
        $tlistac = \App\carrera::where('id','>',5)->lists('nombre','id');
        
        $user = \App\User::where('boleta','=',$B)->lists('boleta','id');
             
             
        return view('Registro.infoCompleta',[
        'index' => $index,
        'tlista' => $tlista,
        'tlistac' => $tlistac,
        'user' => $user
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
            'semestre'=> 'required',
            'grupo'=> 'required',
            'user'=> 'required',
            'tlista'=>'',
            'tlistac'=>'',
        ]); 
        
        
        
        
        if($request->insti=="UPIIZ"){
        
            informacion::create([
                'usuario_id' => $request->user,
                'institucion_id' => 1,
                'carrera_id' => $request->tlista,
                
                'sexo' => $request->sexo,
                'edad' => $request->edad,
            
                'calle' => $request->calle,
                'numExterior' => $request->ext,
                'numInterior' => $request->inter,
                'colonia' => $request->colonia,
                'codigoPostal' => $request->cp,
            
                'semestre' => $request->semestre,
                'grupo' => $request->grupo,
                
        ]);
        }else{
           informacion::create([
                'usuario_id' => $request->user,
                'institucion_id' => 2,
                'carrera_id' => $request->tlistac,
                
                'sexo' => $request->sexo,
                'edad' => $request->edad,
            
                'calle' => $request->calle,
                'numExterior' => $request->ext,
                'numInterior' => $request->inter,
                'colonia' => $request->colonia,
                'codigoPostal' => $request->cp,
            
                'semestre' => $request->semestre,
                'grupo' => $request->grupo,
                
        ]); 
        }
        return redirect('/login');
          
    }
}
