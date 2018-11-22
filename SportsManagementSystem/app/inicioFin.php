<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use Carbon\Carbon;

class inicioFin extends Model
{
    use Eloquence;

    protected $table = 'inicioFinFecha';

    protected $fillable = [
    	'id',
    	'fechaInicio',
    	'fechaFin',
    ];

    protected $dates = [ ];

    public function setFechaAttribute($value){
        $this->attributes['fechaInicio']=Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function getFechaAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function formated(){
        Date::setLocale('es');
        return Date::parse($this->fechaInicio)->format('j \\d\\e F \\d\\e\\l Y');
    }

}
