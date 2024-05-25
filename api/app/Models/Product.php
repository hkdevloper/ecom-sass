<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'sku', 'slug', 'status', 'type', 'price', 'quantity_in_stock', 'thumbnail', 'gallery', 'category_id', 'store_id'];

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
}
