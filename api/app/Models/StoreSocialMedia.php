<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreSocialMedia extends Model
{
    protected $table = 'store_social_media';
    protected $fillable = ['store_id', 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube'];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
