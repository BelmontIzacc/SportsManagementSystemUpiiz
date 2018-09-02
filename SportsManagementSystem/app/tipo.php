<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    //
    protected $table = 'tipo';

    protected $fillable = ['nombre'];

    public function tipo(){
        return $this->hasMany(taller::class, 'tipo_id');
    }
}
