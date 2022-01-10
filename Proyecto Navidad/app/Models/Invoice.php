<?php

namespace App\Models;

class Invoice extends BaseModel
{

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot([
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

    public function getInvoiceNumberAttribute()
    {
        return $this->user->alias . '_' . str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }

}
