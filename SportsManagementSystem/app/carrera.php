<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table = 'carrera';
    
    protected $fillable = ['nombre'];
    
    public $timestamps = false;
    
    public function informacion(){
        return $this->hasMany(informacion::class, 'carrera_id');
    }
}
