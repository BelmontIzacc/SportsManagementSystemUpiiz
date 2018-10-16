<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class stats extends Model
{
    //
    use Eloquence;
    
    protected $table = 'stats';

    protected $fillable = [
    	'id',
        'taller_id',
        'fecha',
        'asistencias',
        'faltas'
    ];

    public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
