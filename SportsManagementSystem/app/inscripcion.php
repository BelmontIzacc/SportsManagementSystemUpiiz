<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
<<<<<<< HEAD

=======
>>>>>>> 9f6db52707c425ec139c86f57e4e3ab2a78ddcc0

class inscripcion extends Model
{
    //
<<<<<<< HEAD

=======
>>>>>>> 9f6db52707c425ec139c86f57e4e3ab2a78ddcc0
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
<<<<<<< HEAD

}

=======
}
>>>>>>> 9f6db52707c425ec139c86f57e4e3ab2a78ddcc0
