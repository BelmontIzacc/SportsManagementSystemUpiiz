<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\User;
use App\informacion;
use App\contactos;

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
        $tlistac = \App\carrera::where('id','>',6)->lists('nombre','id');

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
            'inter' => '',
            'colonia' => 'required',
            'cp' => 'required',

            'insti' => '',
            'semestre'=> '',
            'grupo'=> '',
            'user'=> 'required',
            'tlista'=>'',
            'tlistac'=>'',

            'alergia'=>'required',
            'alergias'=>'',
            'estatura'=>'required',
            'peso'=>'required',
            'sangre'=>'required',

            'segMed'=>'required',
            'segIns'=>'required',

            'nomCon1'=>'required',
            'nomCon2'=>'',
            'telCon1'=>'required',
            'telCon2'=>'',
        ]);


        $Usuario = \App\User::find($request->user);

        $Usuario->update([
            'completado' => 1,
        ]);

        if($request->insti=="UPIIZ"){

            informacion::create([
                'usuario_id' => $request->user,
                'institucion_id' => 1,
                'carrera_id' => $request->tlista,

                'sexo' => $request->sexo -1,
                'edad' => $request->edad,

                'calle' => $request->calle,
                'numExterior' => $request->ext,
                'numInterior' => $request->inter,
                'colonia' => $request->colonia,
                'codigoPostal' => $request->cp,
                'telefono' => $request->telefono,

                'semestre' => $request->semestre,
                'grupo' => $request->grupo,

                'alergias' => $request->alergias,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'sangre' => $request->sangre,

                'segMed' => $request->segMed,
                'regIns' => $request->segIns,

            ]);

            contactos::create([
                'usuario_id' => $request->user,

                'nombre' => $request->nomCon1,
                'telefono' => $request->telCon1,
            ]);

            if (!empty($request->nomCon2) && !empty($request->telCon2)) {
                contactos::create([
                    'usuario_id' => $request->user,

                    'nombre' => $request->nomCon2,
                    'telefono' => $request->telCon2,
                ]);
            }
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

                'alergias' => $request->alergias,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'sangre' => $request->sangre,

                'segMed' => $request->segMed,
                'regIns' => $request->segIns,
            ]);

            contactos::create([
                'usuario_id' => $request->user,

                'nombre' => $request->nomCon1,
                'telefono' => $request->telCon1,
            ]);

            if (!empty($request->nomCon2) && !empty($request->telCon2)) {
                contactos::create([
                    'usuario_id' => $request->user,

                    'nombre' => $request->nomCon2,
                    'telefono' => $request->telCon2,
                ]);
            }
        }


        return redirect('/user');

    }
}
