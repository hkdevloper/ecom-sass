<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'store_id', 'order_number', 'total_amount', 'discount',
        'tax', 'shipping', 'grand_total', 'status'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(OrderStatus::class, 'order_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(OrderPayment::class, 'order_id');
    }
    
    public function statusHistory(): HasMany
    {
        return $this->hasMany(OrderStatus::class, 'order_id');
    }

}
