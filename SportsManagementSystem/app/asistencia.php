<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    //
    protected $table = 'asistencia';

    protected $fillable = [
        'id',
    'usuario_id',
    'taller_id',
    'fecha',
    'asistencia',
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
