<?php

namespace App\Models;

class Product extends BaseModel
{

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withPivot([
            'invoiceQuantity',
            'productName',
            'lotName',
            'lotExpirationDate',
            'productPrice',
            'productSubtotal',
            'tax',
            'productTotal',
        ]);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class)->withPivot('price');
    }

}
