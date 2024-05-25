<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderRefund extends Model
{
    protected $fillable = [
        'payment_id', 'amount', 'status'
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(OrderPayment::class, 'payment_id');
    }
}
