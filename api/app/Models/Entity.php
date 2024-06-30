<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entity extends Model
{
    protected $fillable = ['entity_type', 'name'];
    public function values(): HasMany
    {
        return $this->hasMany(Value::class);
    }
}
