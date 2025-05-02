<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';

    protected $fillable = [
        'recipient_name',
        'recipient_phone',
        'recipient_email',
        'discount',
        'subtotal',
        'total',
        'invoice_number'
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    // Accessors
    public function getFormattedSubtotalAttribute()
    {
        return '$' . number_format($this->subtotal, 2);
    }

    public function getFormattedTotalAttribute()
    {
        return '$' . number_format($this->total, 2);
    }

}
