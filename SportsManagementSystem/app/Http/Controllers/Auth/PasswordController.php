<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
        //protected $redirectTo = '/login';
    protected function resetPassword($user, $password){
            $user->password = bcrypt($password);
            $user->save();
    }
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function redirectPath(){
        if (property_exists($this, 'redirectPath')) {
          return $this->redirectPath;
        }

          return property_exists($this, 'redirectTo') ? $this->redirectTo : '/login';
    }
    /*public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email|min:8|max:28']);

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
            session()->flash('message', 'Se ha enviado un email de confirmacion de recuperacíon de la contraseña a la direccion de correo especificada. Compruebe su correo y siga las intrucciones indicadas para restablecer su contraseña. ');
            session()->flash('type', 'aquamarine');
                return redirect()->back()->with('status', trans($response));
            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }*/
}
