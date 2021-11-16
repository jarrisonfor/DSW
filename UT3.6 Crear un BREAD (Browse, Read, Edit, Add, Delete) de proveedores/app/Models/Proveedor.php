<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreCompañía',
        'nombreContacto',
        'cargoContacto',
        'dirección',
        'ciudad',
        'región',
        'códPostal',
        'país',
        'teléfono',
        'fax',
        'páginaPrincipal',
        'latitud',
        'longitud',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}
