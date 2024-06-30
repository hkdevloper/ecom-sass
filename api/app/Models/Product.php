<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'status',
        'type',
        'mrp',
        'purchase_price',
        'selling_price',
        'thumbnail',
        'gallery',
        'is_visible',
        'availability',
        'category_id',
        'store_id',
        'brand_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(Value::class, 'entity_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'product_id');
    }

    public function shippingDetails(): BelongsTo
    {
        return $this->belongsTo(ShippingDetail::class, 'product_id');
    }
}
