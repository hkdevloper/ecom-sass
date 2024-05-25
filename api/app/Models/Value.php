<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Value extends Model
{
    protected $fillable = [
        'entity_id',
        'attribute_id',
        'value_text',
        'value_int',
        'value_float',
        'value_date',
    ];
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
