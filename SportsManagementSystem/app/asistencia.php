<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    //
    protected $table = 'asistencia';

    protected $fillable = [
    'usuario_id',
    'taller_id',
    'fecha',
    'asistencia',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
	public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
