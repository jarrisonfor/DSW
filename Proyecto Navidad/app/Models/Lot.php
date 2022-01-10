<?php

namespace App\Models;

class Lot extends BaseModel
{

    protected $casts = [
        'deliveryDate' => 'date',
        'expirationDate' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
