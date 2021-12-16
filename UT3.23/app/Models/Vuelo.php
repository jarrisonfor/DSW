<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vuelo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'fecha' => 'date',
    ];

    protected $fillable = [
        'codigo',
        'origen',
        'destino',
        'fecha',
        'hora',
    ];

    public function pasajes()
    {
        return $this->hasMany(Pasaje::class);
    }

    public function piloto()
    {
        return $this->belongsTo(Piloto::class);
    }

}
