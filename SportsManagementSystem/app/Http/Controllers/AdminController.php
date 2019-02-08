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

use Khill\Lavacharts\Lavacharts;
use PDF;

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
        $taller = \App\taller::all();

        $user = Auth::user();

        $array = array();
        $i=0;

        foreach ($taller as $t) {
            $num = rand ( 1 , 25 );
            $array[$i] = ''.$num;
            $i=$i+1;
        }


        return view('Admin.start',[
            'index' => $index,
            'taller'=>$taller,
            'userI' => $user,
        ]);
    }

    public function registerCoord()
    {
        $index=4;
        //$tlista = \App\taller::where('usuario_id','<',1)->lists('nombre','id');
        $tlista = \App\taller::whereNull('usuario_id')->lists('nombre','id'); //Regresa talleres sin coordinador
        $tilista = \App\tipo::lists('nombre','id');
        $inst = \App\institucion::lists('nombre','id');
        $carrera = \App\carrera::lists('nombre','id');
        return view('Admin.registro',[
            'index' => $index,
            'tlista' => $tlista,
            'tilista' => $tilista,
            'inst' => $inst,
            'carrera'=>$carrera,
        ]);
    }

    public function postCoord(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'sexo' => 'required|min:1',
            'telefono' => 'required',
            'email' => 'required|unique:usuario',
            'edad' => 'required',

            'boleta' => 'required|unique:usuario,boleta',
            'password' => 'required',
            'password2' => 'required',

            'plantell' => 'required',

            'col' => 'required',
            'cal' => 'required',
            'numext' => 'required',
            'numin' => 'required',
            'postal' => 'required',

            'taller' => 'required',

            'nombreE' => 'required',
            'telefonoE' => 'required',
        ]);

        $lugar = $request->plantell;

        if($lugar == 'si'){
            $this->validate($request, [
                'carrera' => 'required',
            ]);
        }else if($lugar == 'no'){
            $this->validate($request, [
                'plantel' => 'required',
                'carrera' => 'required',
                'semestre' => 'required|numeric|between:1,13',
            ]);
        }

        $user = User::create([
            'nombre' =>$request->nombre,
            'apellidoPaterno' =>$request->apellidoPaterno,
            'apellidoMaterno' =>$request->apellidoMaterno,
            'email' => $request->email,
            'boleta' => $request->boleta,
            'password' => bcrypt($request->password),
            'tipo' => 3,
            'completado' => 1,
            'permisos' =>1,
        ]);

        \App\contactos::create([
            'usuario_id' => $user->id,
            'nombre' => $request->nombreE,
            'telefono' => $request->telefonoE,
        ]);

        $plantel = $request->plantel;
        if($plantel==0){
            $plantel = null;
        }

        $semestre = $request->semestre;
        if($semestre==0){
            $semestre = null;
        }

        $grupo = $request->grupo;
        if($grupo==' ' || $grupo==''){
            $grupo = null;
        }

        if($lugar == 'si'){

            \App\informacion::create([
                'usuario_id' => $user->id,
                'institucion_id' => 3,
                'semestre' => null,
                'carrera_id' => $request->carrera,
                'calle' => $request->cal,
                'numExterior' => $request->numext,
                'numInterior' => $request->numin,
                'colonia' => $request->col,
                'codigoPostal' => $request->postal,
                'sexo' => $request->sexo,
                'grupo' => null,
                'edad' => $request->edad,
                'telefono' => $request->telefono,
            ]);

        }else if($lugar == 'no'){

            \App\informacion::create([
                'usuario_id' => $user->id,
                'institucion_id' => $plantel,
                'semestre' => $semestre,
                'carrera_id' => $request->carrera,
                'calle' => $request->cal,
                'numExterior' => $request->numext,
                'numInterior' => $request->numin,
                'colonia' => $request->col,
                'codigoPostal' => $request->postal,
                'sexo' => $request->sexo,
                'grupo' => $grupo,
                'edad' => $request->edad,
                'telefono' => $request->telefono,
            ]);
        }

        $opc_taller = $request->taller;

        if($opc_taller=='si'){
            $this->validate($request, [
                'tlista' => 'required|min:1',
            ]);

            $t =  \App\taller::find($request->tlista);
            if($t->usuario_id==null){
               $t->update([
                'usuario_id' => $user->id,
                ]);
            }else{
                return redirect('/admin')
                ->withErrors([
                    $request->clave => 'El taller '.$t->nombre.',Ya cuenta con un coordinador asignado, no se a asignado el taller.',
                ]);
            }

        }else if($opc_taller=='no'){
            $this->validate($request, [
                'nombreTaller' => 'required',
                'duracion' => 'required',
                'dia' => 'required',
                'lugar' => 'required',
                'descri'=>'required',
                'tilista' => 'required',
                'status'=>'required',
                'Date1'=>'required',
                'Date2'=>'required',
            ]);

        $input = 'd-m-Y';
        $date = $request->input('Date1');
        $output = 'Y-m-d';

        $input2 = 'd-m-Y';
        $date2 = $request->input('Date2');
        $output2 = 'Y-m-d';

        $dateFormated = Carbon::createFromFormat($input, $date)->format($output);
        $dateFormated2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        $dias=" ";
        $i=0;
        $tu = count($request->dia);
        foreach($request->dia as $d){
            //$dias = $dias.' , '.$d;
            if($d=='0'){
                $dias='lunes';
            }else if ($d=='1') {
                $dias=$dias.'martes';
            }else if ($d=='2') {
                $dias=$dias.'miercoles';
            }else if ($d=='3') {
                $dias=$dias.'jueves';
            }else if ($d=='4') {
                $dias=$dias.'viernes';
            }

            $i=$i+1;
            if($tu!=$i){
                $dias=$dias.',';
            }else{

            }
        }

        $taller = taller::create([
            'usuario_id'=>$user->id,
            'nombre' =>$request->nombreTaller,
            'fechaInicio' =>$dateFormated,
            'fechaFin'=>$dateFormated2,
            'duracion' =>$request->duracion,
            'descripcion'=>$request->descri,
            'status' => $request->status,
            'lugar' => $request->lugar,
            'dias' => $dias,
            'tipo_id' => $request->tilista,
            ]);
        }

        session()->flash('message', 'Alumno '.$user->nombre.' actualizado correctamente');
        session()->flash('type', 'success');
        return redirect('/admin');
    }

    public function  registerStudio()
    {
        $index=4;
        $tilista = \App\tipo::lists('nombre','id');
        $coord = \App\User::where('tipo','!=',2)->lists('boleta','id');
        $Pcoord = \App\User::where('permisos', 1)->lists('boleta','id');

        return view('Admin.studio',[
            'index' => $index,
            'tilista' => $tilista,
            'coord' => $coord,
            'Pcoord' => $Pcoord,
        ]);
    }

    public function postStudio(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'duracion' => 'required',
            'tipo' => 'required',
            'dia' => 'required',
            'lugar' => 'required',
            'Date1'=>'required',
            'Date2'=>'required',
        ]);

        $input = 'd-m-Y';
        $date = $request->input('Date1');
        $output = 'Y-m-d';

        $input2 = 'd-m-Y';
        $date2 = $request->input('Date2');
        $output2 = 'Y-m-d';

        $dateFormated = Carbon::createFromFormat($input, $date)->format($output);
        $dateFormated2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        $dias=" ";
        $i=0;
        $tu = count($request->dia);
        foreach($request->dia as $d){
            //$dias = $dias.' , '.$d;
            if($d=='0'){
                $dias='lunes';
            }else if ($d=='1') {
                $dias=$dias.'martes';
            }else if ($d=='2') {
                $dias=$dias.'miercoles';
            }else if ($d=='3') {
                $dias=$dias.'jueves';
            }else if ($d=='4') {
                $dias=$dias.'viernes';
            }

            $i=$i+1;
            if($tu!=$i){
                $dias=$dias.',';
            }else{

            }
        }

       $taller = taller::create([
            'nombre' =>$request->nombre,
            'fechaInicio' =>$dateFormated,
            'fechaFin'=>$dateFormated2,
            'duracion' =>$request->duracion,
            'descripcion'=>$request->descri,
            'status' => $request->status,
            'lugar' => $request->lugar,
            'dias' => $dias,
            'tipo_id' => $request->tipo,
            ]);

            $this->validate($request, [
                //'coordinador'=>'required',
                //'Pcoordinador'=>'required',
            ]);

            $idc = $request->coordinador;
            $idPc = $request->Pcoordinador;
            $val=0;
            if($idc!=null){
                $val++;
            }

            if($idPc!=null){
                $val++;
            }
            //error_log('coordinador : '.$idc.' pcoordinador : '.$idPc.' valor : '.$val);

            if($val==2){
                $val=0;
                return back()->withErrors([
                    $request->coordinador => 'Seleccione solo un Coordinador',
                ]);
            }

            if($idc==null){
                $u =  \App\User::find($request->Pcoordinador);
                $taller->update([
                    'usuario_id' => $u->id,
                ]);
            }

            if($idPc==null){
                $u =  \App\User::find($request->coordinador);
                $taller->update([
                    'usuario_id' => $u->id,
                ]);
            }

        session()->flash('message', 'Se a creado el taller '.$request->nombre.' ');
        session()->flash('type', 'success');
        return redirect('/admin');

    }

    public function search()
    {
        $index=1;
        $user = Auth::user();

        return view('Admin.search',[
            'index' => $index,
            'userI' => $user,
        ]);
    }

    public function getSearch(Request $request){
        $index = 1;
        $u = Auth::user();

        switch($request->opc){
            case 1:
                $this->validate($request, [
                    'busqueda' => 'required'
                ]);

                $user = \App\User::where('boleta', $request->busqueda)->get();
                //error_log($user);
                // $id_user = $user->nombre;
                //$informacion = \App\informacion::where('usuario_id',$id_user)->get();

                if(count($user) == 0){
                    session()->flash('message', 'No se encontró ningun registro con la boleta: '.$request->busqueda);
                    session()->flash('type', 'danger');
                }
                return view('Admin.search', ['index'=>$index, 'user'=>$user,'userI' => $u,]);
                break;
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
                return view('Admin.search', ['index'=>$index, 'taller'=>$taller,'userI' => $u,]);
                break;
        }
    }

    public function show($id)
    {
        $index = 1;

        $student = \App\informacion::find($id);
        $iduser = $student->usuario->id;
        $taller = \App\taller::where('usuario_id',$iduser)->get();
        $cont = \App\contactos::where('usuario_id',$iduser)->get();
        $u = Auth::User();

        return view('Admin.student', [
            'index'=>$index,
            'student'=>$student,
            'taller'=>$taller,
            'userI' => $u,
            'cont' => $cont,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $student = \App\informacion::find($id);

        $permisos = $request->perm;
        $status = $request->stats;
        $coordinador = $request->coord;
        $admin = $request->admin;

        $user = \App\User::find($student->usuario->id);

        $userActual = Auth::User();

        if($user->id == $userActual->id){
            session()->flash('message', 'No se puede quitar los permisos de administrador del usuario logeado');
            session()->flash('type', 'danger');
            return back();
        }

        switch($permisos){
            case '1':{
                    //error_log($user->id);
                    $user->permisos = 1;
                break;
            }
            case '0':{
                    //error_log($user->id);
                    $user->permisos = 0;
                break;
            }
        }

        switch($status){
            case '1':{
                    //error_log($user->id);
                    $user->completado = 1;
                break;
            }
            case '0':{
                    //error_log($user->id);
                    $user->completado = 0;
                break;
            }
        }

        switch($admin){
            case '1':{
                    //error_log($user->id);
                    $user->tipo = 1;
                    $user->permisos = 1;

                $user->save();

                session()->flash('message', 'Se a actualizado el Usuario '.$user.' a Administrador');
                session()->flash('type', 'success');

                return back();

                break;
            }
            case '0':{
                //error_log($user->id);
                $user->tipo = 3;
                $user->permisos = 1;

                $user->save();

                session()->flash('message', 'Se a actualizado el Usuario '.$user.' a Coordinador');
                session()->flash('type', 'success');

                return back();

                break;
            }
        }

        switch($coordinador){
            case '1':{
                    //error_log($user->id);
                    $user->tipo = 3;
                    $user->permisos = 1;
                break;
            }
            case '0':{
                    //error_log($user->id);
                    $user->tipo = 2;
                    $user->permisos = 0;

                    $id = $user->id;
                    $taller = \App\taller::where('usuario_id',$id)->get();

                    foreach ($taller as $ta) {
                        $ta->update([
                            'usuario_id' => null,
                        ]);
                    }

                break;
            }
        }

        $user->save();

        session()->flash('message', 'Se a actualizado el Usuario '.$user);
        session()->flash('type', 'success');

        return back();
    }

    public function destroy(Request $request)
    {
        //abort(500);

        $student = \App\informacion::find($request->idVal2);
        $user = \App\User::find($student->usuario->id);

        if($user->taller !=null){

            $idTaller = $user->taller->id;
            $taller = \App\taller::find($idTaller);
            $taller->update([
                'usuario_id' => null,
                'status'=>3,
            ]);

        }

        $user->delete();

        if($request->ajax()){
            return response()->json([
                "message" => "Se ha eliminado a el usuario:",
                "userName" => $user->__tostring(),
                "Id" => $user->boleta,
                "carrer" => $student->carrera->nombre,
            ]);
        }

        session()->flash('message', 'Se eliminó a: '.$user. ' con boleta: '. $user->boleta);

        $user->delete();

        session()->flash('type', 'danger');

        return redirect('/admin/search');
    }

    public function addTallerUser($id){
        $taller = \App\taller::whereNull('usuario_id')->lists('nombre','id'); //Regresa talleres sin coordinador
        $index = 4;
        $iduser = $id;
        $user = \App\informacion::find($id);
        return view('Admin.addTallerUsuario',
            [
                'user'=>$user,
                'id'=>$iduser,
                'index'=>$index,
                'taller'=>$taller,
            ]);
    }

    public function addTaller(Request $request, $id){
        $student = \App\informacion::find($id);

        $this->validate($request, [
            'taller' => 'required',
        ]);

        $taller = \App\taller::find($request->taller);

        $taller->update([
            'usuario_id' => $student->usuario->id,
        ]);

        return back()->withErrors([
                    $request->taller => 'Se a agregado el taller a '.$student->usuario->nombre.'',
                ]);
    }

    public function showInfoUserTaller($id)
    {
        $index = 4;
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();
        $stats = \App\stats::where('taller_id',$id)->get();

        $lava = new Lavacharts();

        $finances = \Lava::DataTable();

        $finances->addDateColumn('Date')
                 ->addNumberColumn('Asistencias')
                 ->addNumberColumn('Faltas')
                 ->setDateTimeFormat('Y-m-d');
                 /*->addRow(['2002-02-01', 1000, 400])
                 ->addRow(['2004-04-03', 1170, 460])
                 ->addRow(['2006-06-05', 660, 1120])
                 ->addRow(['2008-08-07', 1030, 54]);*/

        foreach ($stats as $st) {
            $finances->addRow([$st->fecha,$st->asistencias,$st->faltas]);
        }

        \Lava::ColumnChart('Finances', $finances, [
            'title' => 'Asistencias',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        $sexo = \Lava::DataTable();

        $mujeres=0;
        $hombres=0;

        $carrera = \App\carrera::all();
        $institu = \App\institucion::all();
        $asisten = \App\asistencia::all();

        $array = array();
        $arrayInstituciones = array();
        $faltas = array();
        $asiste = array();

        foreach($carrera as $c){
            $array[$c->id] = 0;
        }

        foreach($institu as $tu){
            $arrayInstituciones[$tu->id] = 0;
        }

        $af=0;
        foreach ($inscripcion as $ins) {
           if($ins->usuario->informacion->sexo == 0){
                $hombres++;
           }else{
                $mujeres++;
           }

           $asiste[$af]=0;
           $faltas[$af]=0;
           foreach($asisten as $asi){
                if( ($asi->usuario_id == $ins->usuario->id) && ($asi->taller_id == $id) ){
                    if($asi->asistencia==1){
                        $asiste[$af]= $asiste[$af]+1;
                    }else if($asi->asistencia==0){
                        $faltas[$af]= $faltas[$af]+1;
                    }
                }
           }

           $af=$af+1;

           foreach ($carrera as $c) {
               if($c->id == $ins->usuario->informacion->carrera_id){
                    $array[$c->id] = $array[$c->id]+1;
               }
           }

           foreach ($institu as $in) {
               if($in->id == $ins->usuario->informacion->institucion_id){
                    $arrayInstituciones[$in->id] = $arrayInstituciones[$in->id]+1;
               }
           }

        }

        $sexo->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(['Hombres', $hombres])
        ->addRow(['Mujeres', $mujeres]);

        \Lava::DonutChart('IMDB', $sexo, [
            'title' => 'Sexo\nHombres: '.$hombres.' - Mujeres: '.$mujeres.'',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        $carrer = \Lava::DataTable();
        $carrer->addStringColumn('Reasons')
        ->addNumberColumn('Percent');

        $i = 0;
        for($i = 1 ; $i<=count($array); $i++){
            $nombre = \App\carrera::find($i);
            $carrer->addRow([''.$nombre->nombre, $array[$i]]);
        }

        \Lava::DonutChart('carrera', $carrer, [
            'title' => 'Carreras',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        $instit = \Lava::DataTable();
        $instit->addStringColumn('Reasons')
        ->addNumberColumn('Percent');

        $j = 0;
        for($j = 1 ; $j<=count($arrayInstituciones); $j++){
            $nombre = \App\institucion::find($j);
            $instit->addRow([''.$nombre->nombre, $arrayInstituciones[$j]]);
        }

        \Lava::DonutChart('INS', $instit, [
            'title' => 'Institucion',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        $total = count($inscripcion);

        return view('Admin.tallerUsuario',
        [
            'index'=>$index,
            'taller'=>$taller,
            'inscripcion'=>$inscripcion,
            'total' => $total,
            'lava' => $lava,
            'asistencia' => $asiste,
            'faltas' => $faltas,
        ]);
    }

    public function checkPassword2(Request $request, $variable){
        $this->validate($request, [
            'clave' => 'required',
        ]);

        if(Hash::check($request->clave, Auth::user()->password)){
            return redirect('/admin/student/'.$variable.'/studio/special');
        } else{
            return redirect('/admin/student/'.$variable.'/studio')
            ->withErrors([
                $request->clave => 'Contraseña Incorrecta',
            ]);
        }
    }

    public function showSpecial($variable){
        $index = -1;
        $taller = \App\taller::find($variable);

        return view('Admin.specialFunctions', ['index'=>$index, 'variable'=>$variable,'taller'=>$taller]);
    }

    public function special(Request $request,$variable){
       $inscritos = $request->stats;
       $estadisticas = $request->perm;
       $asistencia = $request->coord;

       if($inscritos==1) {
            $ins = \App\inscripcion::where('taller_id',$variable);
            $ins->delete();
       }

       if($estadisticas==1){
            $sta = \App\stats::where('taller_id',$variable);
            $sta->delete();

            $as = \App\asistencia::where('taller_id',$variable);
            $as->delete();
       }

        return redirect('/admin/student/'.$variable.'/studio/special')->withErrors([
                $request->stats => 'Se a eliminado los registros',
        ]);

    }

    public function showTaller($id)
    {
        return redirect('/admin/student/'.$id.'/studio');
    }

    public function control()
    {
        $index=4;
        $usuarios = \App\User::all();
        $taller = \App\taller::all();
        $carrer = \App\carrera::all();
        $institucion = \App\institucion::all();
        $tipo = \App\tipo::all();
        $coord = \App\User::where('tipo','!=',2)->get();
        $sp = \App\User::where('permisos',1)->get();

        return view('Admin.control',[
            'index' => $index,
            'usuarios'=>$usuarios,
            'carrer'=>$carrer,
            'taller'=>$taller,
            'institucion' => $institucion,
            'tipo' => $tipo,
            'coord' => $coord,
            'sp' => $sp,
        ]);
    }
    public function checkPassword(Request $request, $variable){
        $this->validate($request, [
            'clave' => 'required',
        ]);


        if(Hash::check($request->clave, Auth::user()->password)){
            return redirect('/admin/controlPanel/insert/'.$variable);
        } else{
            return redirect('/admin/controlPanel')
            ->withErrors([
                $request->clave => 'No coinciden las contraseñas',
            ]);
        }
    }
    public function getRegisterWindow($variable){
        $index = -1;
        //$insti = \App\institucion::all()->lists('nombre','id');
        $insti = \App\institucion::where('id','!=',3)->lists('nombre','id');
        //error_log($insti);
        $data = [
            'index' => $index,
            'variable' => $variable,
            'insti' => $insti,
        ];

        return view('Admin.dialogBox', $data);
    }
    public function insertRegister(Request $request, $variable){
        //return redirect('/blocked');

        $this->validate($request, [
            'nombre' => 'required|min:3|max:255',
        ]);


        if($variable == 1){
            \App\carrera::create([
                'institucion_id' => $request->institucion,
                'nombre' => $request->nombre,
            ]);
        } elseif($variable == 2){
            \App\institucion::create([
                'nombre' => $request->nombre,
            ]);
        }elseif($variable == 4){
            \App\tipo::create([
                'nombre' => $request->nombre,
            ]);
        }

        return redirect('/admin/controlPanel/insert/'. $variable)->withErrors([
                    $request->nombre => 'Se a creado '.$request->nombre.' exitosamente',
                ]);
    }
    public function updateRegister(Request $request, $variable){
            $this->validate($request, [
                'nombre' => 'required',
            ]);

        if($variable == 1){
            $carrer = \App\carrera::find($request->idVal);
            $carrer->update([
                'nombre' => $request->nombre,
            ]);
        } elseif($variable == 2){
            $state = \App\institucion::find($request->idVal);
            $state->update([
                'nombre' => $request->nombre,
            ]);
        } elseif($variable == 3){
            $taller = \App\taller::find($request->idVal);
            $taller->update([
                'nombre' => $request->nombre,
            ]);
        } elseif($variable == 4){
            $place = \App\tipo::find($request->idVal);
            $place->update([
                'nombre' => $request->nombre,
            ]);
        }

        return redirect('/admin/controlPanel/insert/'. $variable)->withErrors([
                    $request->nombre => 'Se a actualizado '.$request->nombre.' exitosamente',
                ]);
    }

    public function deleteRegister(Request $request, $variable){
        //return redirect('/blocked');

        if($variable == 1){
            $carrer = \App\carrera::find($request->idVal2);
            $carrer->delete();
        } elseif($variable == 2){
            $state = \App\institucion::find($request->idVal2);
            $state->delete();
        } elseif($variable == 3){
            $taller = \App\taller::find($request->idVal2);
            $taller->delete();
        } elseif($variable == 4){
            $place = \App\tipo::find($request->idVal2);
            $place->delete();
        }

        return redirect('/admin/controlPanel/insert/'. $variable)->withErrors([
                    $request->nombre => 'Se a eliminado el registro',
                ]);
    }

    public function showInfoListAdd($id){

        $index=4;
        $asistencia = \App\inscripcion::where('taller_id',$id)->get();
        $taller = \App\taller::find($id);

        return view('Admin.addverFecha',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'asistencia' => $asistencia,
        ]);
    }

    public function showInfoListAddPOST(Request $request, $id){
        $this->validate($request, [
            'Date' => 'required'
        ]);

        if(strlen($request->list)==0){

            $fecha = $request->Date;

            $input2 = 'd-m-Y';
            $date2 = $fecha;
            $output2 = 'Y-m-d';

            $dateFormated = Carbon::createFromFormat($input2, $date2)->format($output2);

            $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

            foreach($inscripcion as $ins){
                $s = \App\asistencia::create([
                    'usuario_id' =>$ins->usuario_id,
                    'taller_id' => $id,
                    'fecha' => $dateFormated,
                    'asistencia' => 0,
                ]);
            }

        }else{
            $list = $request->list;
            $tam = explode( ',', $list);
            $fecha = $request->Date;

            $input2 = 'd-m-Y';
            $date2 = $fecha;
            $output2 = 'Y-m-d';

            $dateFormated = Carbon::createFromFormat($input2, $date2)->format($output2);

            $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

                foreach($inscripcion as $ins){
                    $s = \App\asistencia::create([
                        'usuario_id' =>$ins->usuario_id,
                        'taller_id' => $id,
                        'fecha' => $dateFormated,
                        'asistencia' => 0,
                    ]);
                }

                $asistencia = \App\asistencia::where('taller_id',$id)->where('fecha',$dateFormated)->get();

                for($j = 0 ; $j<count($tam); $j++){
                    $user = \App\User::find($tam[$j]);

                    foreach($asistencia as $ins){
                        if($ins->usuario_id == $user->id){

                            $ins->update([
                                'asistencia' => 1,
                            ]);

                            break ;
                        }
                    }

                }
        }

        $faltas=0;
        $asistencias=0;

        $ast = \App\asistencia::where('fecha',$dateFormated)->where('taller_id',$id)->get();

        foreach($ast as $at){
            if($at->asistencia==1){
                $asistencias++;
            }else if($at->asistencia==0){
                $faltas++;
            }
        }


        $stas = \App\stats::create([
            'taller_id' => $id,
            'fecha' => $dateFormated,
            'asistencias' => $asistencias,
            'faltas' => $faltas,
        ]);

        return back();
    }

    public function showInfoList($id){
        $index = 1;
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();
        $stats = \App\stats::where('taller_id',$id)->orderBy('fecha', 'desc')->get();

        return view('Admin.list',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'inscripcion'=>$inscripcion,
            'stats' => $stats,
        ]);
    }

    public function addUserTaller($id){
        $index = 1;
        $taller = \App\taller::find($id);
        $user = \App\User::all();

        return view('Admin.addUserTaller',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'user'=>$user,
        ]);
    }

    public function deleteUserTaller($id){
        $index = 1;
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

        return view('Admin.deleteUserTaller',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'user'=>$inscripcion,
        ]);
    }

    public function deleteUserTallerGet(Request $request, $id){

        $li = $request->lista;

        if(strlen($li)==0){
            return back();
        }else{
            $tam = explode( ',', $li);
            $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

            for($j = 0 ; $j<count($tam); $j++){

                foreach($inscripcion as $ins){
                    if($ins->usuario_id == $tam[$j]){
                        $ins->delete();
                    }
                }

            }
            return redirect('/admin/student/'.$id.'/studio/delete/User')->withErrors([
                                $request->lista => 'Se a Eliminado a los alumnos',
                    ]);
        }
    }

    public function addUserTallerGet(Request $request, $id){

        $li = $request->lista;

        if(strlen($li)==0){
            return back();
        }else{
            $tam = explode( ',', $li);
            $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

            $igual=0;

                for($j = 0 ; $j<count($tam); $j++){
                    $user = \App\User::find($tam[$j]);
                    foreach($inscripcion as $ins){
                        if($ins->usuario_id == $user->id){
                            $igual=1;
                        }
                    }

                    if($igual==0){
                        $u = \App\inscripcion::create([
                            'usuario_id' =>$user->id,
                            'taller_id' => $id,
                        ]);

                        $stats = \App\stats::where('taller_id',$id)->get();

                        foreach ($stats as $st) {
                            $s = \App\asistencia::create([
                                'usuario_id' =>$user->id,
                                'taller_id' => $id,
                                'fecha' => $st->fecha,
                                'asistencia' => 0,
                            ]);
                        }
                    }

                    $igual=0;

                }

            return redirect('/admin/student/'.$id.'/studio/add/User')->withErrors([
                        $request->lista => 'Se a agregado los alumnos al taller',
            ]);
        }
    }

    public function showDate($id,$fecha){
        $index=4;
        $asistencia = \App\asistencia::where('fecha',$fecha)->where('taller_id',$id)->get();
        $taller = \App\taller::find($id);

        $input2 = 'Y-m-d';
        $date2 = $fecha;
        $output2 ='d-m-Y';

        $dateFormated = Carbon::createFromFormat($input2, $date2)->format($output2);

        return view('Admin.verFecha',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'asistencia' => $asistencia,
            'fecha' => $dateFormated,
        ]);
    }

    public function showDatePost(Request $request,$id,$fecha){
        $index=4;
        $flag=0;
        $timer=0;

        $list = $request->lista;
        $date = $request->Date;
        $fech = $fecha;

        if(strlen($date)==0){

        }else if(strlen($date)>=8){
            $flag=1;
            $input2 = 'd-m-Y';
            $date2 = $date;
            $output2 = 'Y-m-d';

            $dateFormated = Carbon::createFromFormat($input2, $date2)->format($output2);

            $asistencia = \App\asistencia::where('fecha',$fecha)->where('taller_id',$id)->get();

            foreach ($asistencia as $asiste) {
                $asiste->update([
                    'fecha' => $dateFormated,
                ]);
            }

            $fech = $dateFormated;
            $timer=1;
        }


        if(strlen($list)==0){

        }else{
            $flag=1;
            $tam = explode( ',', $list);

            $asistencia = \App\asistencia::where('fecha',$fech)->where('taller_id',$id)->get();

                for($j = 0 ; $j<count($tam); $j++){
                    $user = \App\User::find($tam[$j]);
                    $a=-1;

                    foreach($asistencia as $ins){
                        if($ins->usuario_id == $user->id){

                            $igual=1;
                            if($ins->asistencia==1){
                                $a=0;
                            }else if($ins->asistencia==0){
                                $a=1;
                            }

                            $ins->update([
                                'asistencia' => $a,
                            ]);

                            break ;
                        }
                    }

                }

            $faltas=0;
            $asistencias=0;

            $ast = \App\asistencia::where('fecha',$fech)->where('taller_id',$id)->get();

            foreach($ast as $at){
                if($at->asistencia==1){
                    $asistencias++;
                }else if($at->asistencia==0){
                    $faltas++;
                }
            }

            if($timer==1){
                $stats = \App\stats::where('taller_id',$id)->where('fecha',$fecha)->get();

                foreach ($stats as $s) {
                    $s->update([
                        'fecha' => $fech,
                        'asistencias' => $asistencias,
                        'faltas' => $faltas,
                    ]);
                }

            }else if($timer==0){
                $stats = \App\stats::where('taller_id',$id)->where('fecha',$fecha)->get();

                foreach ($stats as $s) {
                    $s->update([
                        'asistencias' => $asistencias,
                        'faltas' => $faltas,
                    ]);
                }
            }

        }

        if($flag==1){
            return redirect('/admin/student/'.$id.'/studio/list/date/'.$fech)->withErrors([
                        $request->lista => 'Se a Actualizado los registros',
            ]);
        }else{
            return back();
        }



    }

    public function getInf(Request $request,$id) {
        return redirect('/admin/student/'.$id.'/studio');
    }

    public function showTallerAdd($id){
        $index=4;
        $taller = \App\taller::where('usuario_id','!=',$id)->get();
        $user = \App\User::find($id);

        return view('Admin.listTallerAdd',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'user' => $user,
        ]);
    }

    public function showTallerAddGet(Request $request,$id){
        $index=4;
        $list = $request->lista;

        if(strlen($list)==0){
            return back();
        }else{
            $tam = explode( ',', $list);
            $registrado=0;

            for($j = 0 ; $j<count($tam); $j++){

                $inscripcion = \App\inscripcion::where('taller_id',$tam[$j])->get();
                $a=-1;

                foreach($inscripcion as $ins){
                    if($ins->usuario_id == $id){
                        $registrado=1;
                        break ;
                    }
                }

                if($registrado==1){

                }else{
                    $u = \App\inscripcion::create([
                        'usuario_id' =>$id,
                        'taller_id' => $tam[$j],
                    ]);

                    $stats = \App\stats::where('taller_id',$tam[$j])->get();

                    foreach ($stats as $st) {
                        $s = \App\asistencia::create([
                            'usuario_id' =>$id,
                            'taller_id' => $tam[$j],
                            'fecha' => $st->fecha,
                            'asistencia' => 0,
                        ]);
                    }
                }

                $registrado==0;

            }

            return back()->withErrors([
                        $request->lista => 'Se a agregado el usuario a los talleres',
            ]);
        }
    }

    public function controlspecial(){
        $index = -1;

        return view('Admin.controlSpecialFunctions', ['index'=>$index]);
    }

    public function controlSpecialGet(Request $request){

        $usuario = $request->usuarios;
        $coordinador = $request->coordinador;
        $usuarioP = $request->usuariosP;
        $todo = $request->todo;


        if($todo==1){

            $u = \App\User::where('tipo','!=',1)->get();
            foreach ($u as $key) {
                $informacion = \App\informacion::where('usuario_id',$key->id)->get();
                foreach ($informacion as $inf) {
                    $inf->delete();
                }
                $asistencia = \App\asistencia::where('usuario_id',$key->id)->get();
                foreach ($asistencia as $as) {
                    $as->delete();
                }
                $inscripcion = \App\inscripcion::where('usuario_id',$key->id)->get();
                foreach ($inscripcion as $insc) {
                    $insc->delete();
                }
                $key->delete();
            }


        }else{
            if($usuario==1){
                $u = \App\User::where('tipo',2)->get();
                foreach ($u as $key) {
                    $informacion = \App\informacion::where('usuario_id',$key->id)->get();
                    foreach ($informacion as $inf) {
                        $inf->delete();
                    }
                    $asistencia = \App\asistencia::where('usuario_id',$key->id)->get();
                    foreach ($asistencia as $as) {
                        $as->delete();
                    }
                    $inscripcion = \App\inscripcion::where('usuario_id',$key->id)->get();
                    foreach ($inscripcion as $insc) {
                        $insc->delete();
                    }

                    if($key->taller !=null){

                        $idTaller = $key->taller->id;
                        $taller = \App\taller::find($idTaller);
                        $taller->update([
                            'usuario_id' => null,
                            'status'=>3,
                        ]);

                    }

                    $key->delete();
                }
            }
            if($coordinador==1){
                $u = \App\User::where('tipo',3)->get();
                foreach ($u as $key) {
                    $informacion = \App\informacion::where('usuario_id',$key->id)->get();
                    foreach ($informacion as $inf) {
                        $inf->delete();
                    }
                    $asistencia = \App\asistencia::where('usuario_id',$key->id)->get();
                    foreach ($asistencia as $as) {
                        $as->delete();
                    }
                    $inscripcion = \App\inscripcion::where('usuario_id',$key->id)->get();
                    foreach ($inscripcion as $insc) {
                        $insc->delete();
                    }

                    if($key->taller !=null){

                        $idTaller = $key->taller->id;
                        $taller = \App\taller::find($idTaller);
                        $taller->update([
                            'usuario_id' => null,
                            'status'=>3,
                        ]);

                    }

                    $key->delete();
                }
            }
            if($usuarioP==1){
                $u = \App\User::where('tipo',2)->where('permisos',1)->get();
                foreach ($u as $key) {
                    $informacion = \App\informacion::where('usuario_id',$key->id)->get();
                    foreach ($informacion as $inf) {
                        $inf->delete();
                    }
                    $asistencia = \App\asistencia::where('usuario_id',$key->id)->get();
                    foreach ($asistencia as $as) {
                        $as->delete();
                    }
                    $inscripcion = \App\inscripcion::where('usuario_id',$key->id)->get();
                    foreach ($inscripcion as $insc) {
                        $insc->delete();
                    }

                     if($key->taller !=null){

                        $idTaller = $key->taller->id;
                        $taller = \App\taller::find($idTaller);
                        $taller->update([
                            'usuario_id' => null,
                            'status'=>3,
                        ]);

                    }

                    $key->delete();
                }
            }

        }

        return back()->withErrors([
                        $request->usuario => 'Se a eliminado los registros',
        ]);

    }

    public function checkControl(Request $request){
        $this->validate($request, [
            'clave' => 'required',
        ]);

        $opc = $request->control;

        if($opc == '1'){ //funcion de borrado

            if(Hash::check($request->clave, Auth::user()->password)){
                return redirect('/admin/controlPanel/special/select');
            } else{
                return redirect('/admin/controlPanel')
                ->withErrors([
                    $request->clave => 'No coinciden las contraseñas d:',
                ]);
            }
        }else if($opc == '2'){ //control de registros

            if(Hash::check($request->clave, Auth::user()->password)){
                return redirect('/admin/controlPanel/control/register');
            } else{
                return redirect('/admin/controlPanel')
                ->withErrors([
                    $request->clave => 'No coinciden las contraseñas d:',
                ]);
            }

        }

    }

    public function controlRegister(){
        $index = 4;
        $RS = \App\inicioFin::where('id',1)->get(); //sistema
        $RT = \App\inicioFin::where('id',2)->get(); //talleres

        $dRS1;
        $dRS2;

        foreach ($RS as $s) {
            $input = 'Y-m-d';
            $date = $s->fechaInicio;
            $output = 'd-m-Y';

            $input2 = 'Y-m-d';
            $date2 = $s->fechaFin;
            $output2 = 'd-m-Y';

            $dRS1 = Carbon::createFromFormat($input, $date)->format($output);
            $dRS2 = Carbon::createFromFormat($input2, $date2)->format($output2);
        }

        $dRT1;
        $dRT2;

        foreach ($RT as $t) {
            $input = 'Y-m-d';
            $date = $t->fechaInicio;
            $output = 'd-m-Y';

            $input2 = 'Y-m-d';
            $date2 = $t->fechaFin;
            $output2 = 'd-m-Y';

            $dRT1 = Carbon::createFromFormat($input, $date)->format($output);
            $dRT2 = Carbon::createFromFormat($input2, $date2)->format($output2);
        }

        return view('Admin.controlRegister', ['index'=>$index, 'RS1'=>$dRS1, 'RS2'=>$dRS2, 'RT1'=>$dRT1, 'RT2'=>$dRT2 ]);
    }

    public function controlRegisterPost(Request $request){

        $RS = \App\inicioFin::where('id',1)->get();
        $RT = \App\inicioFin::where('id',2)->get();

        $dRS1='-1';
        $dRS2='-1';

        foreach ($RS as $s) {

            $input = 'd-m-Y';
            $output = 'Y-m-d';

            $dr1 = $s->fechaInicio;
            $dr2 = $s->fechaFin;

            $rdrs1 = ''.$request->DateRS1;
            $rdrs2 = ''.$request->DateRS2;

            $ddr1 = Carbon::createFromFormat($input, $rdrs1)->format($output);
            $ddr2 = Carbon::createFromFormat($input, $rdrs2)->format($output);

            if($ddr1 == $dr1){
                //error_log('Igual fecha inicio');
            }else{
                //error_log('Diferente fecha inicio');
                $dRS1 = $ddr1;
            }

            if($ddr2 == $dr2){
                //error_log('Igual fecha fin');
            }else{
                //error_log('Diferente fecha fin');
                $dRS2 = $ddr2;
            }
        }


        $dRT1='-1';
        $dRT2='-1';

        foreach ($RT as $s) {

            $input = 'd-m-Y';
            $output = 'Y-m-d';

            $dr1 = $s->fechaInicio;
            $dr2 = $s->fechaFin;

            $rdrs1 = ''.$request->DateRT1;
            $rdrs2 = ''.$request->DateRT2;

            $ddr1 = Carbon::createFromFormat($input, $rdrs1)->format($output);
            $ddr2 = Carbon::createFromFormat($input, $rdrs2)->format($output);

            if($ddr1 == $dr1){
                //error_log('Igual fecha inicio');
            }else{
                //error_log('Diferente fecha inicio');
                $dRT1 = $ddr1;
            }

            if($ddr2 == $dr2){
                //error_log('Igual fecha fin');
            }else{
                //error_log('Diferente fecha fin');
                $dRT2 = $ddr2;
            }
        }

        if($dRS1 != '-1'){
            foreach ($RS as $s) {
                $s->update([
                    'fechaInicio' => $dRS1,
                ]);
            }
        }

        if($dRS2 != '-1'){
            foreach ($RS as $s) {
                $s->update([
                    'fechaFin' => $dRS2,
                ]);
            }
        }

        if($dRT1 != '-1'){
            foreach ($RT as $s) {
                $s->update([
                    'fechaInicio' => $dRT1,
                ]);
            }
        }

        if($dRT2 != '-1'){
            foreach ($RT as $s) {
                $s->update([
                    'fechaFin' => $dRT2,
                ]);
            }
        }

        $b = $request->usuarios;
        $b2 = $request->usuarios2;

        if($b == 1){
            $user = \App\User::where('tipo','!=',1)->get();

            foreach ($user as $u) {
                $u->update([
                    'completado' => 0,
                ]);
            }

        }

        if($b2 == 1){
            $user = \App\User::where('tipo','!=',1)->get();

            foreach ($user as $u) {
                $u->update([
                    'completado' => 1,
                ]);
            }

        }

        return back()->withErrors([
                    $request->usuarios => 'Se a actualizado los datos correctamente',
                ]);;

    }

    public function pagination(){
        $index = -1;

        $user = \App\User::where('tipo','!=',1)->paginate(12);
        $u = Auth::User();

        return view('Admin.pagination', ['index'=>$index, 'user'=> $user, 'userI'=>$u]);
    }

    public function profile()
    {
        $index = 4;
        $user = Auth::user();

          return view('Admin.profile', [
              'index'=>$index,
              'user' => $user,
          ]);

    }

    public function profilePassword(Request $request)
    {
        $this->validate($request, [
            'clave' => 'required',
        ]);

        if(Hash::check($request->clave, Auth::user()->password)){
            $index = 4;

            $edit = true;
            $user = Auth::user();

          return view('Admin.profile', [
              'index'=>$index,
              'user'=>$user,
              'edit'=>$edit,
          ]);

        } else{
            return redirect('/admin/profile/')
            ->withErrors([
                $request->clave => 'No coinciden las contraseñas',
            ]);
        }
    }

    public function editProfile(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|min:3|max:50',
            'apellidoPaterno' => 'required|min:3|max:50',
            'apellidoMaterno' => 'required|min:3|max:50',
            'email'           => 'required|min:8|max:28',
            'boleta' => 'required|max:12|:min:3',
            'pass' => 'required',
        ]);

        $user = Auth::user();

        if($request->pass=='1'){
            $this->validate($request,[
                'clave' => 'required|same:clave2|min:3|max:30',
                'clave2' => 'required',
            ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellidoPaterno' => $request->apellidoPaterno,
            'apellidoMaterno' => $request->apellidoMaterno,
            'boleta' => $request->boleta,
            'email' => $request->email,
            'password' => bcrypt($request->clave),
        ]);

        }else{

        $user->update([
            'nombre' => $request->nombre,
            'apellidoPaterno' => $request->apellidoPaterno,
            'apellidoMaterno' => $request->apellidoMaterno,
            'boleta' => $request->boleta,
            'email' => $request->email,
        ]);

        }

        session()->flash('message', 'Usuario '.$user. ' actualizado correctamente');
        session()->flash('type', 'success');

        return redirect('/admin/profile/');
    }

    public function Reportes($idT,$idU) {

        $user = \App\User::where('id',$idU)->get();
        $taller = \App\taller::where('id',$idT)->get();
        $constancia = \App\Constancia::all();

        $compAnio = date('Y');
        $ind;
        foreach ($constancia as $c) {
            if(substr($c->modificado,-12,4)==$compAnio) {
                $ind = $c->index+1;
            } else {
                $ind = 1;

            }
            $c = \App\Constancia::find(1);
            $c->index = $ind;
            $c->modificado = date('Y-m-d');
            $c->save();
        }
        if(strlen($ind)==1) {
            $ind = "00".$ind;
        } else if(strlen($ind)==2) {
            $ind = "0".$ind;
        }
        $dia = date('d');
        $mes = date('m');
        $anio = date('Y');

        if($mes>=1&&$mes<=6) {
            $periodo = date('y').'-2';
        } else if($mes>=7&&$mes<=12){
            $ye = date('y');
            $ye = $ye+1;
            $periodo = ($ye.'-1');
        }
        switch ($mes) {
            case 1:
                $mes = 'Enero';
                break;
            case 2:
                $mes = 'Febrero';
                break;
            case 3:
                $mes = 'Marzo';
                break;
            case 4:
                $mes = 'Abril';
                break;
            case 5:
                $mes = 'Mayo';
                break;
            case 6:
                $mes = 'Junio';
                break;
            case 7:
                $mes = 'Jiluo';
                break;
            case 8:
                $mes = 'Agosto';
                break;
            case 9:
                $mes = 'Septiembre';
                brek;
            case 10:
                $mes = 'Octubre';
                break;
            case 11:
                $mes = 'Noviembre';
                break;
            case 12:
                $mes = 'Diciembre';
                break;
        }

        $d = date('l', strtotime($dia));
        $y = strtotime($anio);

        $fecha = $this->fecha();

        $detalles = ['user'=>$user,
                     'taller'=>$taller,
                     'dia'=> $dia,
                     'mes'=>$mes,
                     'anio'=>$anio,
                     'periodo'=>$periodo,
                     'anio'=>date('Y'),
                     'fecha'=>$fecha,
                     'index'=>$ind
                    ];

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('Admin.reporte',$detalles);
        return $pdf->stream();
    }

    public function fecha() {
        $dias = ["uno","un","dos","tres","cuatro","cinco","seis","ocho","nuve","diez","once","doce","trece","catorce","quince",
                 "dieciséis","deicisiete", "dieciocho","diecinueve","veinte","veintiuno","veintidos","veintres","veinticuatro",
                 "veinticinco","veintiséis","veintisiete","veintiocho","veintinueve","treinta","treintaiuno"];

        $cientos = [" "," ciento "," doscientos "," trescientos "," cuatrocientos "," quinietnos "," seiscientos "," setecientos ",
                    " ochocientos "," novecientos "];

        $meses = ["","enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","octubre","noviembre","disiembre"];

        $dia = date('d');
        $mes = date('m');
        $anio = date("Y");
        $auxAnio;

        if(substr($dia,-2,1)==0) {
            $dia = substr($dia,-1);
        }
        if(substr($mes,-2,1)==0) {
            $mes = substr($mes,-1);
        }
        if(substr($anio,-2,1)==0) {
            $auxAnio = substr($anio,-1);
        } else {
            $auxAnio = substr($anio,-2);
        }


        return $dias[$dia]." dias de ".$meses[$mes]." de ".$dias[substr($anio,-4,1)]." mil".$cientos[substr($anio,-3,1)].$dias[$auxAnio];
    }

    public function editTaller($id)
    {
        $index = 1;

        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();
        $total = count($inscripcion);
        $tilista = \App\tipo::lists('nombre','id');
        $coord = \App\User::where('tipo','!=',2)->lists('boleta','id');
        $Pcoord = \App\User::where('permisos', 1)->lists('boleta','id');

        $unico = explode(",", $taller->dias);
        $tu = count($unico);
        $i=1;
        $j=0;

        $dias="";
        $array = array();

        foreach($unico as $u){
            //$dias = $dias.' , '.$d;
            if($u=='lunes'){
                $dias='0';
                $array[$j] = 0;
            }else if ($u=='martes') {
                $dias=$dias.'1';
                $array[$j] = 1;
            }else if ($u=='miercoles') {
                $dias=$dias.'2';
                $array[$j] = 2;
            }else if ($u=='jueves') {
                $dias=$dias.'3';
                $array[$j] = 3;
            }else if ($u=='viernes') {
                $dias=$dias.'4';
                $array[$j] = 4;
            }

            $i=$i+1;
            $j=$j+1;

            if($tu!=$i){

            }else{
               $dias=$dias.',';
            }

        }

        $input = 'Y-m-d';
        $date = $taller->fechaInicio;
        $output = 'd-m-Y';
        $dF = Carbon::createFromFormat($input, $date)->format($output);

        $input2 = 'Y-m-d';
        $date2 = $taller->fechaFin;
        $output2 = 'd-m-Y';
        $dF2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        $u = Auth::User();

        return view('Admin.editTaller', [
            'index'=>$index,
            'taller'=>$taller,
            'total' => $total,
            'tilista' => $tilista,
            'coord' => $coord,
            'Pcoord' => $Pcoord,
            'tDi' =>$array,
            'dF' => $dF,
            'dF2' => $dF2,
            'userI'=>$u,
        ]);
    }

    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'duracion' => 'required',
            'tipo' => 'required',
            'dia' => 'required',
            'lugar' => 'required',
            'Date1'=>'required',
            'Date2'=>'required',
            'taller'=>'required',
            'descri' =>'required',
        ]);

        $input = 'd-m-Y';
        $date = $request->input('Date1');
        $output = 'Y-m-d';

        $input2 = 'd-m-Y';
        $date2 = $request->input('Date2');
        $output2 = 'Y-m-d';

        $dateFormated = Carbon::createFromFormat($input, $date)->format($output);
        $dateFormated2 = Carbon::createFromFormat($input2, $date2)->format($output2);

        $dias=" ";
        $i=0;
        $tu = count($request->dia);
        foreach($request->dia as $d){
            //$dias = $dias.' , '.$d;
            if($d=='0'){
                $dias='lunes';
            }else if ($d=='1') {
                $dias=$dias.'martes';
            }else if ($d=='2') {
                $dias=$dias.'miercoles';
            }else if ($d=='3') {
                $dias=$dias.'jueves';
            }else if ($d=='4') {
                $dias=$dias.'viernes';
            }

            $i=$i+1;
            if($tu!=$i){
                $dias=$dias.',';
            }else{

            }
        }

       $taller = \App\taller::find($request->idTaller);
       $taller->update([
            'nombre' =>$request->nombre,
            'fechaInicio' =>$dateFormated,
            'fechaFin'=>$dateFormated2,
            'duracion' =>$request->duracion,
            'descripcion'=>$request->descri,
            'status' => $request->status,
            'lugar' => $request->lugar,
            'dias' => $dias,
            'tipo_id' => $request->tipo,
            'descripcion' => $request->descri,
            ]);

        $opc_taller = $request->taller;

        if($opc_taller=='si'){
            $this->validate($request, [
                //'coordinador'=>'required',
                //'Pcoordinador'=>'required',
            ]);

            $idc = $request->coordinador;
            $idPc = $request->Pcoordinador;
            $val=0;
            if($idc!=null){
                $val++;
            }

            if($idPc!=null){
                $val++;
            }
            //error_log('coordinador : '.$idc.' pcoordinador : '.$idPc.' valor : '.$val);

            if($val==2){
                $val=0;
                return back()->withErrors([
                $request->coordinador => 'Seleccione solo un Coordinador',
            ]);;
            }
            $u =  \App\User::find($request->coordinador);
            $taller->update([
                'usuario_id' => $u->id,
            ]);
        }

        session()->flash('message', 'Se a editado el taller '.$request->nombre.' ');
        session()->flash('type', 'success');
        return redirect('/admin');

    }
}
