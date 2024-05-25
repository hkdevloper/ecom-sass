<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = ['name', 'type', 'label', 'status', 'store_id'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(Value::class, 'attribute_id');
    }
}
