<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    protected $table = 'stores';
    protected $fillable = ['name', 'phone', 'email', 'logo', 'cover_image', 'description', 'status', 'type', 'category_id', 'user_id', 'address_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(StoreCategory::class, 'category_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function details(): HasMany
    {
        return $this->hasMany(StoreDetail::class, 'store_id');
    }

    public function socialMedia(): HasMany
    {
        return $this->hasMany(StoreSocialMedia::class, 'store_id');
    }

    public function additionalInformation(): HasMany
    {
        return $this->hasMany(StoreAdditionalInformation::class, 'store_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

}
