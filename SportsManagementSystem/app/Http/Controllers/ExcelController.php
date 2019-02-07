<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function All()
    {

        \Excel::create('Lista_Todos_Registrados',function($excel)
        {
            $excel->sheet('Registrados',function($sheet)
            {
                    $users = \DB::table('usuario')
                        ->join('informacion','informacion.usuario_id','=','usuario.id')
                        ->join('carrera','carrera.id','=','informacion.carrera_id')
                        ->join('institucion','institucion.id','=','informacion.institucion_id')
                        ->select('usuario.boleta as Boleta','usuario.apellidoPaterno as A.Paterno','usuario.apellidoMaterno as A.Materno','usuario.nombre as Nombre','usuario.email as Email','institucion.nombre as Institucion','carrera.nombre as Carrera_Bachiller','informacion.semestre as Semestre','informacion.grupo as Grupo','informacion.edad as Edad','informacion.colonia as Colonia','informacion.calle as calle','informacion.numExterior as numExterior','informacion.numInterior as numInterior','informacion.codigoPostal as CP','informacion.telefono as Telefono')
                        ->where('usuario.tipo','!=',1)
                        ->OrderBy('carrera.nombre')      
                        ->get();

                        $users = json_decode(json_encode($users),true);
        
                        $sheet->cells('A1:P1', function($cells) 
                        {
                        /*modifica fila*/
            
                        $cells->setBackground('#8A0829');
                        $cells->setFontColor('#ffffff');

                        });
             
              $sheet->fromArray($users);
            });
          })->export('xls');
    }

/*

SELECT usuario.boleta as Boleta, usuario.apellidoPaterno as APaterno , usuario.apellidoMaterno as AMaterno, usuario.nombre as Nombre, usuario.email as Email, institucion.nombre as Institucion ,carrera.nombre as CarreraBachiller, informacion.semestre as semestre, informacion.grupo as grupo, informacion.edad as edad, informacion.colonia as colonia, informacion.calle as calle , informacion.numExterior as numExterior, informacion.numInterior as numInterior, informacion.codigoPostal as CP, informacion.telefono as telefono
FROM usuario
INNER JOIN informacion ON informacion.usuario_id = usuario.id
INNER JOIN carrera ON carrera.id = informacion.carrera_id
INNER JOIN institucion ON institucion.id = informacion.institucion_id
WHERE usuario.tipo != 1
ORDER BY carrera.nombre

*/

public function taller($id){

    $taller = \App\taller::find($id);
    \Excel::create('Lista_Taller_Registrados',function($excel) use($taller)
        {
            $excel->sheet(''.$taller->nombre,function($sheet) use($taller)
            {
                    /*$users = \DB::table('usuario')
                        ->join('informacion','informacion.usuario_id','=','usuario.id')
                        ->join('carrera','carrera.id','=','informacion.carrera_id')
                        ->select(\DB::raw("CONCAT(usuario.apellidoPaterno,' ',usuario.apellidoMaterno,' ',usuario.nombre) as Nombre"),'usuario.boleta as Boleta','carrera.nombre as Carrera_Bachiller',
                            \DB::raw("IF(informacion.sexo = 0,'Hombre','Mujer') as Sexo"), 'informacion.edad as Edad')    
                        ->where('taller.id','=',$taller->id)
                        ->OrderBy('usuario.apellidoPaterno')      
                        ->get();

                        $users = json_decode(json_encode($users),true);*/
                        
                        $inscripcion = \App\inscripcion::where('taller_id',$taller->id)->get();

                        $sheet->cells('A1:E1', function($cells) 
                        {
                        /*modifica fila*/
            
                        $cells->setBackground('#8A0829');
                        $cells->setFontColor('#ffffff');

                        });

                        $sheet->row(1,[
                            'Nombre','Boleta','Carrera','Sexo','Edad'
                        ]);

                        $x = 0;
                        foreach ($inscripcion as $i) {

                            $s = " ";
                            if($i->usuario->informacion->sexo == 0){
                                $s = "Hombre";
                            }else{
                                $s = "Mujer";
                            }


                            $sheet->row($x+2,[
                                $i->usuario,
                                $i->usuario->boleta,
                                $i->usuario->informacion->carrera->nombre,
                                $sexo = $s,
                                $i->usuario->informacion->edad,
                            ]);
                            $x=$x+1;
                        }
             
                //$sheet->fromArray($inscripcion);
                //$sheet->fromArray($users);
            });
        })->export('xls');
}
/*
SELECT usuario.nombre as Nombre, usuario.apellidoPaterno as ApellidoPaterno, usuario.apellidoMaterno as ApellidoMaterno,  usuario.boleta as Boleta, carrera.nombre, informacion.sexo as Sexo
FROM taller,usuario
INNER JOIN informacion ON informacion.usuario_id = usuario.id
INNER JOIN carrera ON carrera.id = informacion.carrera_id
WHERE taller.id = 2
ORDER BY usuario.apellidoPaterno

SELECT CONCAT(usuario.nombre,' ',usuario.apellidoPaterno ,' ',usuario.apellidoMaterno ) as nombre,usuario.boleta as Boleta, carrera.nombre, informacion.sexo as Sexo
FROM usuario
INNER JOIN informacion ON informacion.usuario_id = usuario.id
INNER JOIN carrera ON carrera.id = informacion.carrera_id
WHERE usuario.tipo != 2
ORDER BY usuario.apellidoPaterno


SELECT usuario.nombre as Nombre, usuario.apellidoPaterno as ApellidoPaterno, usuario.apellidoMaterno as ApellidoMaterno,  usuario.boleta as Boleta, carrera.nombre, IF(informacion.sexo = 0, 'Mujer','Hombre') AS Genero
FROM usuario
INNER JOIN informacion ON informacion.usuario_id = usuario.id
INNER JOIN carrera ON carrera.id = informacion.carrera_id
WHERE usuario.tipo != 2
ORDER BY usuario.apellidoPaterno

*/



}
