<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class informacion extends Model
{
    use Eloquence;
    
    protected $table = 'informacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        'usuario_id',
        'institucion_id',
        'carrera_id',
        'edad',
        'grupo',
        'sexo',
        'semestre',   
        'calle',
        'numExterior',
        'numInterior',
        'colonia',
        'codigoPostal',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function institucion(){
        return $this->belongsTo(institucion::class, 'institucion_id');
    }
    public function carrer(){
        return $this->belongsTo(carrer::class, 'carrera_id');
    }
}
