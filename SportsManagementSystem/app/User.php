<?php

namespace App;

use Illuminate\Auth\Authenticatable;

use Sofa\Eloquence\Eloquence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Eloquence;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'id',
        'nombre',
        'boleta',
        'email',
        'tipo',
        'password',   
        'apellidoPaterno',
        'apellidoMaterno',
        'completado',
        'tipo',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function __toString(){
        return $this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
    }
    public function informacion(){
        return $this->hasOne(informacion::class,'usuario_id');
    }
    public function taller(){
        return $this->hasOne(taller::class,'usuario_id');
    }
    public function completado(){
        return $this->getOriginal('completado');
    }
    public function tipo(){
        return $this->getOriginal('tipo');
    }
}
