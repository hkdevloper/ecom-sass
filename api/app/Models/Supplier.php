<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['name', 'store_name', 'email', 'phone', 'address_id', 'status'];

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function purchaseDetails(): HasMany
    {
        return $this->hasMany(PurchaseDetail::class, 'supplier_id');
    }

    public function salesDetails(): HasMany
    {
        return $this->hasMany(SalesDetail::class, 'supplier_id');
    }
}
