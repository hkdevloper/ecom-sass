<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $fillable = ['brand_name', 'description', 'slug', 'status', 'thumbnail'];
}
