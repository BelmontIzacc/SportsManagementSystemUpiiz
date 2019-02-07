<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

use Khill\Lavacharts\Lavacharts;

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
        $user = Auth::user();

        return view('Coord.coor.start',[
            'index' => $index,
            'taller'=>$taller,
            'user'=>$user
        ]);
    }

    public function index2()
    {
        $index=1;
        $taller = \App\taller::all();
        $user = Auth::user();

        return view('Coord.start',[
            'index' => $index,
            'taller'=>$taller,
            'user'=>$user
        ]);
    }

    public function indexPost(Request $request)
    {
        $value = $request->stats;
        if($value == 0){ // vista usuario
            session()->flash('message', 'Menu de Usuario');
            session()->flash('type', 'info');

            return redirect('user');
        }else if($value == 1){ //vista coordinador
            session()->flash('message', 'Menu de Coordinador');
            session()->flash('type', 'info');

            return redirect('/coord');
        }
    }

    public function profile()
    {
        $index = 4;
        $user = Auth::user();

          return view('Coord.coor.profile', [
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

          return view('Coord.coor.profile', [
              'index'=>$index,
              'user'=>$user,
              'edit'=>$edit,
          ]);

        } else{
            return redirect('/coord/profile')
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

        return redirect('/coord/profile');
    }

    public function mostrarTaller($id){
        $index = 1;
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

        return view('Coord.coor.taller',
        [
            'index'=>$index,
            'taller'=>$taller,
            'inscripcion'=>$inscripcion,
            'lava' => $lava,
            'asistencia' => $asiste,
            'faltas' => $faltas,
            'fechaI' => $dF,
            'fechaF' => $dF2,
            'valor' => $valor,
            't' => $t,
        ]);
    }

    public function asistenciaTaller($id){
        $index=4;
        $asistencia = \App\inscripcion::where('taller_id',$id)->get();
        $taller = \App\taller::find($id);

        return view('Coord.coor.addverFecha',[
            'index' => $index,
            'variable' => $id,
            'taller'=>$taller,
            'asistencia' => $asistencia,
        ]);
    }

    public function guardarAsistencia(Request $request, $id){
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

        //return back();
        session()->flash('message', 'Se a tomado la asistencia correctamente');
        session()->flash('type', 'success');
        return redirect('/coord/taller/'.$id.'');
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
        return view('Coord.taller', [
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

    public function tallerInfo()
    {
         $index=1;
         $user = Auth::User();
         $inscripcion = \App\inscripcion::where('usuario_id',$user->id)->get();
         $total = count($inscripcion);
         return view('Coord.tallerInfo',[
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

         return view('Coord.tallerRe',[
                    'index' => $index,
                    'user' => $user,
                    'taller'=> $taller,
                    'total' => $total,
                    'fechaI' => $dF,
                    'fechaF' => $dF2,
                    't' => $t,
                ]);
    }

    public function getInfo()
    {
        $index=1;
        $user = Auth::user();
        $info = \App\informacion::where('usuario_id','=',$user->id)->first();
        $cont = \App\contactos::where('usuario_id',$user->id)->get();
        
        return view('Coord.informacion',[
            'index' => $index,
            'user' => $user,
            'info'=> $info,
            'cont'=>$cont,
        ]);
    }

        public function getEditInfo()
    {
        $index=1;
        $user = Auth::user();
        $info = \App\informacion::where('usuario_id','=',$user->id)->first();
        $tlista = \App\carrera::where('id','<=',6)->lists('nombre','id');
        $tlistac = \App\carrera::where('id','>',6)->lists('nombre','id');

        return view('Coord.EditarInfo',[
            'index' => $index,

            'user' => $user,
            'userI' => $user,

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

            'alergias' => 'required',
            'estatura' => 'required',
            'peso' => 'required',
            'segMed' => 'required',
            'segIns' => 'required',
            'sangre' => 'required'
        ]);



        $user = Auth::user();
        $infoUser = \App\informacion::find($user->informacion->id);

        if($request->insti=="UPIIZ") {
            $this->validate($request, [
                'Carrera'=>'required',
            ]);

            $infoUser-> update([
                'institucion_id' => 1,
                'carrera_id' => $request->Carrera,

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

                'alergias' => $request->alergias,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'sangre' => $request->sangre,

                'segMed' => $request->segMed,
                'segIns' => $request->segIns,
            ]);
            $infoUser->save();
        } else if($request->insti == "CECyT"){
            $this->validate($request, [
                'Bachiller' => 'required',
            ]);

           $infoUser->update([
                'institucion_id' => 2,
                'carrera_id' => $request->Bachiller,

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

                'alergias' => $request->alergias,
                'estatura' => $request->estatura,
                'peso' => $request->peso,
                'sangre' => $request->sangre,

                'segMed' => $request->segMed,
                'segIns' => $request->segIns,
            ]);
           $infoUser->save();
        } else {
            $infoUser->update([
                'institucion_id' => 3,
                'carrera_id' => 1,

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

                 'alergias' => $request->alergias,
                 'estatura' => $request->estatura,
                 'peso' => $request->peso,
                 'sangre' => $request->sangre,

                 'segMed' => $request->segMed,
                 'segIns' => $request->segIns,
             ]);
            $infoUser->save();
        }
            $user-> update([
                'nombre' => $request->nombre,
                'apellidoPaterno' => $request->apellidoP,
                'apellidoMaterno' => $request->apellidoM,
                'boleta' => $request->boleta,
                'email'  => $request->email
            ]);
            $user->save();
       return redirect('/coord/user/Info');
    }

    public function postShowTaller(Request $request,$id)
    {
        $user = Auth::User();
        $taller = \App\taller::find($id);
        $inscripcion = \App\inscripcion::where('taller_id',$id)->get();

        if($user->id == $taller->usuario_id){
            session()->flash('message', 'No puedes inscribirte al taller que impartes');
            session()->flash('type', 'danger');
            return redirect('/coord/User');
        }

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
        return redirect('/coord/User');
    }

    public function EditContactos() {
        $index = 1;
        $user = Auth::User();
        $contactos = \App\contactos::where('usuario_id',$user->id)->get();
        $info = \App\informacion::find($user->informacion->id);

        $data = [
            'index' => $index,
            'user' => $user,
            'userI' => $user,
            'info' => $info,
            'contactos' => $contactos
        ];

        return view('Coord.editContactos', $data);
    }

    public function postEditContactos(Request $request) {
        $cont = \App\contactos::find($request->contacto_id);

        $cont->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
        ]);

        return redirect('/coord/user/editContactos');
    }

    public function crearContacto(Request $request) {

        $this->validate($request, [
            'nombre' => 'required',
            'telefono' => 'required',
        ]);
        
        $user = Auth::User();

        \App\contactos::create([
            'usuario_id' => $user->id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
        ]);

        return redirect('/coord/user/editContactos');
    }

    public function eliminarContacto($id) {
        $cont = \App\contactos::find($id);

        $cont->delete();

        return redirect('/coord/user/editContactos');
    }
}
