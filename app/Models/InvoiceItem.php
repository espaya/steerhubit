<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = 'invoice_item';

    protected $fillable = [
        'invoice_id',
        'product_name',
        'price',
        'quantity',
        'order_total',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
