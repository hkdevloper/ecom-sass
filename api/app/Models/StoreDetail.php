<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreDetail extends Model
{
    protected $table = 'store_details';
    protected $fillable = ['store_id', 'website', 'working_days', 'opening_time', 'closing_time'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}
