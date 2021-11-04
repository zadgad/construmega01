<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion';

    public function vehiculos()
    {
        return $this -> belongsToMany(Vehiculo::class);
        //una via pertenece a un solo grupo
    }

    public function registros()
    {
        return $this -> belongsToMany(Vehiculo::class,'registro','id_ubicacion','id_tipo');
        //una via pertenece a un solo grupo
    }
}
