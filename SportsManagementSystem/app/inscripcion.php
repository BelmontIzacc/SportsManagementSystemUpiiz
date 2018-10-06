<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class inscripcion extends Model
{
    //
    use Eloquence;
    protected $table = 'inscripcion';

    protected $fillable = [
	    'usuario_id',
	    'taller_id',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
