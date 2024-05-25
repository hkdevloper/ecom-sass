<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoreCategory extends Model
{
    protected $table = 'store_categories';
    protected $fillable = ['name', 'slug', 'description', 'status', 'thumbnail'];

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'category_id');
    }
}
