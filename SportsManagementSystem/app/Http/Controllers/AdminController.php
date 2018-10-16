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
        return view('Admin.start',[
        'index' => $index,
        'taller'=>$taller,
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
            'email' => 'required',
            'edad' => 'required',

            'boleta' => 'required|unique:usuario,boleta',
            'password' => 'required',
            'password2' => 'required',

            'plantel' => 'required',
            'carrera' => 'required',
            'semestre' => 'required',

            'col' => 'required',
            'cal' => 'required',
            'numext' => 'required',
            'numin' => 'required',
            'postal' => 'required',

            'taller' => 'required',
        ]);

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
        foreach($request->dia as $d){
            //$dias = $dias.' , '.$d;
            if($d=='0'){
                $dias='Lunes';
            }else if ($d=='1') {
                $dias=$dias.',Martes';
            }else if ($d=='2') {
                $dias=$dias.',Miercoles';
            }else if ($d=='3') {
                $dias=$dias.',Jueves';
            }else if ($d=='4') {
                $dias=$dias.',Viernes';
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
            'taller'=>'required',
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
        foreach($request->dia as $d){
            //$dias = $dias.' , '.$d;
            if($d=='0'){
                $dias='Lunes';
            }else if ($d=='1') {
                $dias=$dias.',Martes';
            }else if ($d=='2') {
                $dias=$dias.',Miercoles';
            }else if ($d=='3') {
                $dias=$dias.',Jueves';
            }else if ($d=='4') {
                $dias=$dias.',Viernes';
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

        session()->flash('message', 'Se a creado el taller '.$request->nombre.' ');
        session()->flash('type', 'success');
        return redirect('/admin');

    }

    public function search()
    {
        $index=1;
        return view('Admin.search',[
            'index' => $index,
        ]);
    }

    public function getSearch(Request $request){
        $index = 1;

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
                return view('Admin.search', ['index'=>$index, 'user'=>$user]);
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
                return view('Admin.search', ['index'=>$index, 'taller'=>$taller]);
                break;
        }
    }

    public function show($id)
    {
        $index = 1;

        $student = \App\informacion::find($id);
        $iduser = $student->usuario->id;
        $taller = \App\taller::where('usuario_id',$iduser)->get();

        return view('Admin.student', [
            'index'=>$index,
            'student'=>$student,
            'taller'=>$taller,
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
        $user = \App\User::find($student->usuario->id);

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
        $idStudent = $taller->usuario_id;
        $student = \App\informacion::where('usuario_id',$idStudent)->get();
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

        $lava = new Lavacharts();

        $finances = \Lava::DataTable();

        $finances->addDateColumn('Year')
                 ->addNumberColumn('Sales')
                 ->addNumberColumn('Expenses')
                 ->setDateTimeFormat('Y')
                 ->addRow(['2004', 1000, 400])
                 ->addRow(['2005', 1170, 460])
                 ->addRow(['2006', 660, 1120])
                 ->addRow(['2007', 1030, 54]);

        \Lava::ColumnChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('Admin.tallerUsuario', 
            [
                'id'=>$id,
                'index'=>$index,
                'student'=>$student,
                'taller'=>$taller,
                'inscripcion'=>$inscripcion,
                'lava' => $lava,
            ]);
    }

    public function showTaller($id)
    {
        $index = 1;
        $taller = \App\taller::find($id);

        return view('Admin.taller', [
            'index'=>$index,
            'taller'=>$taller,
        ]);
    }

    public function control()
    {
        $index=4;
        $usuarios = \App\User::all();
        $taller = \App\taller::all();
        $carrer = \App\carrera::all();

        return view('Admin.control',[
            'index' => $index,
            'usuarios'=>$usuarios,
            'carrer'=>$carrer,
            'taller'=>$taller,
        ]);
    }
    
    public function getInf(Request $request, $id) {
         $index = 1;

        switch($request->opc){
            case 2:
                $this->validate($request, [
                    'busqueda' => 'required'
                ]);

                $inscripcion = \App\inscripcion::where('taller_id', $request->busqueda)->get();
                //error_log($user);
                // $id_user = $user->nombre;
                //$informacion = \App\informacion::where('usuario_id',$id_user)->get();

                //if(count($inscripcion) == 0){
                    //session()->flash('message', 'No se encontró ningun registro con la boleta: '.$request->busqueda);
                    //session()->flash('type', 'danger');
                //}
                return view('Admin.search', ['index'=>$index, 'inscripcion'=>$inscripcion]);
                break;
            /*case 2:
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
                return view('Admin.search', ['index'=>$index, 'taller'=>$taller]);
                break;*/
        }
    }
}
