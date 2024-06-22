<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Value extends Model
{
    protected $table = 'values';
    protected $fillable = [
        'entity_id', 'attribute_id', 'value_text', 'value_string', 'value_int', 'value_float',
        'value_date', 'value_time', 'value_datetime', 'value_json', 'value_boolean'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'entity_id');
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class, 'attribute_id');
    }
}
