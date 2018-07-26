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


class user extends Model implements AuthenticatableContract,
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
        'nombre',
        'boleta',
        'email',
        'tipo',
        'password',
        'edad',
        'grupo',
        'semestre',      
        'apellidoPaterno',
        'apellidoMaterno',
        'carrera_id',
        'completado',
    ];
    //protected $guarded = ['tipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function carrer(){
        return $this->belongsTo(carrer::class, 'carrera_id');
    }
    public function getOrigenAttribute($value){
        return config('globalInfo.nombreUpiiz2');
    }
    public function __toString(){
        return $this->nombre.' '.$this->apellidoPaterno.' '.$this->apellidoMaterno;
    }
    public function getTipoAttribute($value){
        return config('global.tipos')[$value];
    }
    public function tipo(){
        return $this->getOriginal('tipo');
    }
    public function vivienda(){
        return $this->hasOne(tenement::class,'usuario_id');
    }
    public function gasto(){
        return $this->hasOne(spending::class,'usuario_id');
    }
    public function antecedentes(){
        return $this->hasOne(record::class,'usuario_id');
    }
    public function personales(){
        return $this->hasOne(personal::class,'usuario_id');
    }
}
