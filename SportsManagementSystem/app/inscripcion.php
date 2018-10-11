<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Sofa\Eloquence\Eloquence;
=======
>>>>>>> esto es un respaldo de avance

class inscripcion extends Model
{
    //
<<<<<<< HEAD
    use Eloquence;
    protected $table = 'inscripcion';

    protected $fillable = [
	    'usuario_id',
	    'taller_id',
=======
    protected $table = 'inscripcion';

    protected $fillable = [
    'usuario_id',
    'taller_id',
>>>>>>> esto es un respaldo de avance
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> esto es un respaldo de avance
