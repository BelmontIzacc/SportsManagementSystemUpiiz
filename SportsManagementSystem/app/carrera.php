<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table = 'carrera';

    protected $fillable = [
        'institucion_id',
        'nombre',
    ];

	public function informacion(){
	        return $this->hasMany(informacion::class, 'carrera_id');
	}
    public function institucio() {
        return $this-hasOne(institucion::class, 'id');
    }
}
