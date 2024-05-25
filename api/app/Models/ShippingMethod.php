<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name', 'description', 'status'
    ];

    public function shippingRates(): HasMany
    {
        return $this->hasMany(ShippingRate::class, 'shipping_method_id');
    }
}
