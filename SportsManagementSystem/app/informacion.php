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
            'id',
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
        'telefono',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function institucion(){
        return $this->belongsTo(institucion::class, 'institucion_id');
    }
    public function carrera(){
        return $this->belongsTo(carrera::class, 'carrera_id');
    }
}
