<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'status'
    ];

    /**
     * Cast attributes
     */
    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
        'deleted_at' => 'datetime',
    ];

    /**
     * Auto clear cache when product changes
     */
    protected static function booted()
    {
        static::saved(function () {
            cache()->forget('active_products');
        });

        static::deleted(function () {
            cache()->forget('active_products');
        });
    }

    /**
     * Scope: only active & not deleted products
     */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Relationship: Product has many cart items
     */
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    /**
     * Accessor: formatted price (for UI)
     */
    public function getFormattedPriceAttribute()
    {
        return '₹' . number_format((float) $this->price, 2);
    }
}
