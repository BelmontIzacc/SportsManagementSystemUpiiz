<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tallerdatos extends Model
{
    //
    protected $table = 'tallerdatos';


    protected $fillable = [
        'usuario_id',
        'taller_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function taller(){
        return $this->belongsTo(taller::class, 'taller_id');
    }
}
