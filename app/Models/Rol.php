<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'rol';

    public function usr_rol()
    {
        return $this -> hasMany(Usr_Rol::class, 'rol_id');
        //un grupo puede tener multiples sesiones
    }
}
