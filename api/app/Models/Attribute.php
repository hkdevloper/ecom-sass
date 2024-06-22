<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $fillable = ['name', 'type', 'label', 'status', 'store_id'];

    public static array $types = [
        'text' => 'Text',
        'textarea' => 'Textarea',
        'select' => 'Select',
        'multiselect' => 'Multiselect',
        'checkbox' => 'Checkbox',
        'radio' => 'Radio',
        'date' => 'Date',
        'time' => 'Time',
        'datetime' => 'Datetime',
        'file' => 'File',
        'image' => 'Image',
        'color' => 'Color',
        'price' => 'Price',
        'weight' => 'Weight',
        'dimension' => 'Dimension',
        'html' => 'HTML',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(Value::class, 'attribute_id');
    }
}
