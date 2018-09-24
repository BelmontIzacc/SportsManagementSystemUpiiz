<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class institucion extends Model
{
    //
    protected $table = 'institucion';
    
    protected $fillable = ['nombre'];
    
    public $timestamps = false;
    
    public function institucion(){
        return $this->hasMany(informacion::class, 'institucion_id');
    }
}
