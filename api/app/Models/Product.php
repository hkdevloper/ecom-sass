<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    protected $table = 'products';
    /*
     * Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->string('status')->default('active');
            $table->string('type')->default('product');
            $table->float('mrp')->default(0);
            $table->float('purchase_price')->default(0);
            $table->float('selling_price')->default(0);
            $table->string('thumbnail')->default('https://via.placeholder.com/350x450');
            $table->json('gallery')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->dateTime('availability')->default(DB::raw('DATE_ADD(NOW(), INTERVAL 1 DAY)'));
            $table->foreignId('category_id')->constrained('product_categories')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brand')->onDelete('cascade');
            $table->timestamps();
        });
     * */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'status',
        'type',
        'mrp',
        'purchase_price',
        'selling_price',
        'thumbnail',
        'gallery',
        'is_visible',
        'availability',
        'category_id',
        'store_id',
        'brand_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function values(): HasMany
    {
        return $this->hasMany(Value::class, 'entity_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class, 'product_id');
    }

    public function shippingDetails(): BelongsTo
    {
        return $this->belongsTo(ShippingDetail::class, 'product_id');
    }
}
