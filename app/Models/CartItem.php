<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'session_id',
        'product_id',
        'quantity',
    ];

    /**
     * Cast attributes
     */
    protected $casts = [
        'quantity'   => 'integer',
        'deleted_at' => 'datetime',
    ];

    /**
     * Relationship: CartItem belongs to Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Accessor: subtotal (price * quantity)
     */
    public function getSubtotalAttribute(): float
    {
        $price = optional($this->product)->price;

        return $price
            ? (float) $price * $this->quantity
            : 0.0;
    }

    /**
     * Scope: only current session cart items
     */
    public function scopeCurrentSession($query)
    {
        return $query->where('session_id', session()->getId());
    }
}
