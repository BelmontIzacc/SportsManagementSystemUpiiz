<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taller extends Model
{
    //
    protected $table = 'taller';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'usuario_id',
        'nombre',
        'coordinador',
        'fechaInicio',
        'fechaFin',
        'duracion',   
        'status',
        'lugar',
        'dias',
        'tipo_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function tipo(){
        return $this->hasOne(tipo::class, 'tipo_id');
    }
    public function asistencia(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
