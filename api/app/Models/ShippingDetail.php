<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    protected $table = 'shipping_details';
    protected $fillable = ['is_backorder', 'requires_shipping', 'product_id'];
}
