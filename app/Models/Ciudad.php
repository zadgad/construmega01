<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudad';

    public function vias()
    {
        return $this -> hasMany(via::class, 'id_avenida' );
        //un grupo puede tener multiples sesiones
    }
    public function ciudades()
    {
        return $this -> belongsTo(via::class,'id_ciudad','id_via' );
        //un grupo puede tener multiples sesiones
    }
    public function ciud($id){
        return Ciudad::where('depa','=',$id)->get();
    }
}
