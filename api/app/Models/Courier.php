<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Courier extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address_id', 'status'
    ];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(CourierService::class, 'courier_id');
    }

    public function carriers(): HasMany
    {
        return $this->hasMany(ShippingCarrier::class, 'courier_id');
    }
}
