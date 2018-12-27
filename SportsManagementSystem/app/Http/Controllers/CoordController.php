<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;

use Hash;
use Carbon\Carbon;

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

        return view('Coord.coor.start',[
            'index' => $index,
            'taller'=>$taller,
        ]);
    }

    public function index2()
    {
        $index=1;
        $taller = \App\inscripcion::where('usuario_id',Auth::user()->id)->get();
        $user = Auth::user();

        return view('User.start',[
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
}
