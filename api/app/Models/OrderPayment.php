<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderPayment extends Model
{
    protected $fillable = [
        'order_id', 'payment_method_id', 'amount', 'status'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function refunds(): HasMany
    {
        return $this->hasMany(OrderRefund::class, 'payment_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(OrderTransaction::class, 'payment_id');
    }
}
