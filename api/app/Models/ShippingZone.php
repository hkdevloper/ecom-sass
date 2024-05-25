<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingZone extends Model
{
    protected $fillable = [
        'name', 'description', 'status'
    ];

    public function shippingRates(): HasMany
    {
        return $this->hasMany(ShippingRate::class, 'shipping_zone_id');
    }

    public function shippingCarriers(): HasMany
    {
        return $this->hasMany(ShippingCarrier::class, 'shipping_zone_id');
    }
}
