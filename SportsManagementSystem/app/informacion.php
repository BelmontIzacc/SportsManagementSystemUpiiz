<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

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
        'codigoPostal'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function institucion(){
        return $this->belongsTo(institucion::class, 'institucion_id');
    }
    public function carrera(){
        return $this->belongsTo(carrera::class, 'carrera_id');
    }
}
