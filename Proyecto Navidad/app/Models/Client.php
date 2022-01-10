<?php

namespace App\Models;

class Client extends BaseModel
{

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('price');
    }

}
