<?php

namespace App;

use Illuminate\Auth\Authenticatable;

use Sofa\Eloquence\Eloquence;

use Illuminate\Database\Eloquent\Model;

class contactos extends Model
{
    use Eloquence;
    
    protected $table = 'contactos';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'id',
        'usuario_id',
        'nombre',
        'telefono',
    ];

    /**
    * The attributes excludded fro the modelś JSON form.
    *
    * @var array
    */

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
?>
