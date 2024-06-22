<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreAdditionalInformation extends Model
{
    protected $table = 'store_additional_information';
    protected $fillable = ['store_id', 'key', 'value'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
