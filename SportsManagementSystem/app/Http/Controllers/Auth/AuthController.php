<?php

namespace App\Http\Controllers\Auth;

use App\User as user;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Carbon\Carbon;
    
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //$this->validate($request,[
                'nombre'=>'required|min:1|max:50',
                'apellidoPaterno'=>'required|min:1|max:50',
                'apellidoMaterno'=>'required|min:1|max:50',
                'email'=>'required|unique:usuario|min:7|max:90',
                'boleta'=>'required',
                'password' => 'required', 
                'password2' => 'required',
            //]);
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = user::create([
            'nombre' => $data['nombre'],
            'apellidoPaterno'=>$data['apellidoPaterno'],
            'apellidoMaterno'=>$data['apellidoMaterno'],
            'email'=>$data['email'],
            'boleta'=>$data['boleta'],
            'password' => bcrypt($data['password']),
            'tipo' => 2,
            'permisos' => 0,
            'completado' => 0,
        ]);

        $student = \App\informacion::create([
            'usuario_id'=>$user->id,
            'institucion_id' => 1,
            'carrera_id' => 3,
            'semestre' => 12,
            'calle' => 'Calle generica',
            'numExterior' => ''.rand (0 , 9),
            'numInterior' => ''.rand (0 , 9),
            'colonia' => 'Generica',
            'codigoPostal' => rand (0 , 1).rand (0 , 1).rand (0 , 1).rand (0 , 1),
            'sexo' => ''.rand (0 , 1),
            'grupo' => '2CM3',
            'edad' => rand (0 , 2).rand (0 , 2),
            'telefono' => rand (0 , 1).rand (0 , 1).rand (0 , 1).rand (0 , 1),
            'alergias' => 'Generico',
            'estatura' => rand (151,180),
            'peso' => rand (45,68),
            'sangre' => 'A+',
            'segMed' => rand (0,1),
            'segIns' => rand (0,1),
        ]);

        return $user;
    }

    //---------------------------------------------------------------------------------------------//

    public function getRegister(){
        $index = 4;
        return view('Registro.RegistroUsuario', ['index'=>$index]);
    }

    public function getLogin()
    {

        if (view()->exists('auth.authenticate')) 
        {
            return view('auth.authenticate');
        }

        $index = 4;

        /////// control de registro al sistema

        $dateSE = \App\inicioFin::all();
        $dateA = Carbon::now();
        $dateA = $dateA->format('Y-m-d');

        

         $fecha_inicio = strtotime($dateSE->find(1)->fechaInicio);
         $fecha_fin = strtotime($dateSE->find(1)->fechaFin);
         $fecha = strtotime($dateA);

         $valor;
         if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin))
            $valor=1;
         else
             $valor=2;

        return view('auth.login', ['index'=>$index, 'valor'=>$valor]);
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return redirect($this->loginPath())
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }

   /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request){
        //return $request->only($this->loginUsername(), 'password');
        return array(
            $this->loginUsername() => $request->boleta,
            'password'  => $request->password,
        );
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage(){
        return Lang::has('auth.failed')
                ? Lang::get('auth.failed')
                : 'These credentials do not match our records.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout(){
        Auth::logout();
        session()->flash('message', 'Se ha cerrado sesión');
        session()->flash('type', 'warning');
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath(){
        return property_exists($this, 'loginPath') ? $this->loginPath : '/login';
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function loginUsername(){
        return property_exists($this, 'username') ? $this->username : 'boleta';
    }

    //-------------------------------------------------------------------------------------------------------//

    public function redirectPath(){
        if (property_exists($this, 'redirectPath')) {
          return $this->redirectPath;
        }

        if(Auth::user()->tipo() == 1){
          session()->flash('message', '¡Bienvenido! - Inició sesión como administrador');
          session()->flash('type', 'info');

          return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin';
        } else if(Auth::user()->tipo() == 2){
              session()->flash('message', '¡Bienvenido '. Auth::user(). '!');
              session()->flash('type', 'success');

              return property_exists($this, 'redirectTo') ? $this->redirectTo : '/user';
        } else if(Auth::user()->tipo() == 3){
              session()->flash('message', '¡Bienvenido! - Inició sesión como Coordinador');
              session()->flash('type', 'blue-dirty');

          return property_exists($this, 'redirectTo') ? $this->redirectTo : '/coord';
        }

    }
}
