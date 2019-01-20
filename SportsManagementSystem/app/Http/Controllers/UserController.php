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
use App\institucion;
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
        if($user->completado!=1){

            $index=4;
            $tlista = \App\carrera::where('id','<=',5)->lists('nombre','id');
            $tlistac = \App\carrera::where('id','>',6)->lists('nombre','id');

            $wop = \App\User::where('boleta','=',$user->boleta)->lists('boleta','id');


            return view('Registro.infoCompleta',[
                'index' => $index,
                'tlista' => $tlista,
                'tlistac' => $tlistac,
                'user' => $wop
            ]);

        }else{
             $index=1;
             $user = Auth::User();
             $taller = \App\taller::all();
             return view('User.start',[
                        'index' => $index,
                        'user' => $user,
                        'taller'=> $taller,
                    ]);
        }
    }

    public function tallerInfo()
    {
         $index=1;
         $user = Auth::User();
         $inscripcion = \App\inscripcion::where('usuario_id',$user->id)->get();
         $total = count($inscripcion);
         return view('User.tallerInfo',[
                    'index' => $index,
                    'user' => $user,
                    'inscripcion'=> $inscripcion,
                    'total' => $total,
                ]);
    }

    public function tallerInfoRegister($id)
    {
         $index=1;
         $user = Auth::User();
         $taller = \App\taller::find($id);
         $inscripcion = \App\inscripcion::where('taller_id',$id)->get();
         $total = count($inscripcion);

        $input =  'Y-m-d';
        $date = $taller->fechaInicio;
        $output = 'd-m-Y';

        $dF = Carbon::createFromFormat($input, $date)->format($output);

        $input2 = 'Y-m-d';
        $date2 = $taller->fechaFin;
        $output2 = 'd-m-Y';

        $dF2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        $t = $taller->status; 

         return view('User.tallerRe',[
                    'index' => $index,
                    'user' => $user,
                    'taller'=> $taller,
                    'total' => $total,
                    'fechaI' => $dF,
                    'fechaF' => $dF2,
                    't' => $t,
                ]);
    }
    public function getProfile()
    {
        $index=1;
        $user = Auth::user();
        $student = \App\informacion::where('usuario_id','=',$user->id)->first();

        return view('User.perfil',[
            'index' => $index,
            'user' => $user,
            'student'=> $student,

        ]);
    }

    public function getEdit()
    {
        $index=1;
        $user = Auth::user();
        $student = \App\informacion::where('usuario_id','=',$user->id)->first();

        return view('User.EditarPerfil',[
            'index' => $index,
            'user' => $user,
            'student'=> $student,

        ]);
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'email' => 'required',
            'boleta' => 'required',

            'telefono' => 'required',

            ]);

         $user = Auth::user();
         $infoUser = \App\informacion::find($user->informacion->id);

        $user->update([
            'nombre' => $request->nombre,
            'apellidoPaterno' => $request->apellidoPaterno,
            'apellidoMaterno' => $request->apellidoMaterno,
            'boleta' => $request->boleta,
            'email' => $request->email
        ]);

        $infoUser-> update([
            'telefono' => $request->telefono
        ]);


        return redirect('/user/Profile');
    }


    public function getInfo()
    {
        $index=1;
        $user = Auth::user();
        $info = \App\informacion::where('usuario_id','=',$user->id)->first();

        return view('User.informacion',[
            'index' => $index,
            'user' => $user,
            'info'=> $info
        ]);
    }

    public function getEditInfo()
    {
        $index=1;
        $user = Auth::user();
        $info = \App\informacion::where('usuario_id','=',$user->id)->first();
        $tlista = \App\carrera::where('id','<=',6)->lists('nombre','id');
        $tlistac = \App\carrera::where('id','>',6)->lists('nombre','id');

        return view('User.EditarInfo',[
            'index' => $index,

            'user' => $user,

            'info'=> $info,

            'tlista'=> $tlista,

            'tlistac'=> $tlistac
        ]);
    }

   public function postEditInfo (Request $request)
    {


        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'edad' => 'required',
            'telefono' => 'required',

            'calle' => 'required',
            'ext' => 'required',
            'inter' => 'required',
            'colonia' => 'required',
            'cp' => 'required',

            'insti' => 'required',
            'semestre'=> 'required',
            'grupo'=> 'required',
            'boleta'=> 'required',
            'email'=> 'required',
            'tlista'=>'',
            'tlistac'=>'',
        ]);



        $user = Auth::user();
        $infoUser = \App\informacion::find($user->informacion->id);

        if($request->insti=="UPIIZ"){

            $infoUser-> update([
                'institucion_id' => 1,
                'carrera_id' => $request->tlista,

                'edad' => $request->edad,
                'telefono' => $request->telefono,
                'sexo' => $request->sexo -1,

                'calle' => $request->calle,
                'numExterior' => $request->ext,
                'numInterior' => $request->inter,
                'colonia' => $request->colonia,
                'codigoPostal' => $request->cp,

                'semestre' => $request->semestre,
                'grupo' => $request->grupo,

        ]);
        }else{
           $infoUser->update([
                'institucion_id' => 2,
                'carrera_id' => $request->tlistac,

                'edad' => $request->edad,
               'telefono' => $request->telefono,
               'sexo' => $request->sexo -1,

                'calle' => $request->calle,
                'numExterior' => $request->ext,
                'numInterior' => $request->inter,
                'colonia' => $request->colonia,
                'codigoPostal' => $request->cp,

                'semestre' => $request->semestre,
                'grupo' => $request->grupo,

        ]);
        }
            $user-> update([
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoP,
                'apellidoMaterno' => $request->apellidoM,
                'boleta' => $request->boleta,
                'email'  => $request->email
            ]);

       return redirect('/user/Info');
    }



    public function getSearch()
    {
        $index=1;
        $user = Auth::User();
        return view('User.search',[
            'index' => $index,
            'user' => $user,
        ]);
    }
    public function postSearch(Request $request){
        $index = 1;
        $user = Auth::User();

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
                return view('User.search', ['index'=>$index, 'taller'=>$taller, 'user'=>$user]);
                break;
        }

    }

    public function showTaller($id)
    {
        $index = 1;
        $user = Auth::User();
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();
        $total = count($inscripcion);

        $input =  'Y-m-d';
        $date = $taller->fechaInicio;
        $output = 'd-m-Y';

        $dF = Carbon::createFromFormat($input, $date)->format($output);

        $input2 = 'Y-m-d';
        $date2 = $taller->fechaFin;
        $output2 = 'd-m-Y';

        $dF2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        /////// control de registro de taller

        $dateSE = \App\inicioFin::all();
        $dateA = Carbon::now();
        $dateA = $dateA->format('Y-m-d');

        

         $fecha_inicio = strtotime($dateSE->find(2)->fechaInicio);
         $fecha_fin = strtotime($dateSE->find(2)->fechaFin);
         $fecha = strtotime($dateA);

         $valor;
         if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
            $valor=1;
         else
             $valor=2;

        $t = $taller->status; 
        return view('User.taller', [
            'index'=>$index,
            'taller'=>$taller,
            'user'=>$user,
            'total' => $total,
            'fechaI' => $dF,
            'fechaF' => $dF2,
            'valor' => $valor,
            't' => $t,
        ]);
    }

    public function postShowTaller(Request $request,$id)
    {
        $user = Auth::User();
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();


                $insc=0;
                foreach ($inscripcion as $ins) {
                    if($ins->usuario_id == $user->id) {
                        $insc = 1;
                    }
                }
                if($insc==0) {
                    \App\inscripcion::create([
                        'usuario_id' => $user->id,
                        'taller_id' => $id
                    ]);

                } else {
                    
                }

        session()->flash('message', 'Se a inscrito al taller '.$taller->nombre.' ');
        session()->flash('type', 'success');

        return redirect('/user');
    }
}
