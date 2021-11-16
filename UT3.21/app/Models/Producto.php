<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto',
        'proveedor_id',
        'cantidad_por_unidad',
        'precio_unidad',
        'unidades_existencia',
        'unidades_pedido',
        'nivel_nuevo_pedido',
        'suspendido',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

}
