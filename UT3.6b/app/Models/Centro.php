<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'denominacion',
        'direccion',
        'municipio',
        'ciudad',
        'isla',
        'codigoPostal',
        'provincia',
        'latitud',
        'longitud',
    ];

}
