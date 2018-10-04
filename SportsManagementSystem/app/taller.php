<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class taller extends Model
{
    //
    
    use Eloquence;
    
    protected $table = 'taller';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'usuario_id',
        'nombre',
        'fechaInicio',
        'fechaFin',
        'duracion',   
        'status',
        'lugar',
        'descripcion',
        'dias',
        'tipo_id',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function tipo(){
        return $this->belongsTo(tipo::class, 'tipo_id');
    }
    public function asistencia(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
