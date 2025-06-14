<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItems extends Model
{
    //
    protected $fillable = [
        "product_id",
        "cart_id",
        "quantity"
    ];

    /**
     * Relationships
     */
    /**
     * Get the product for the cart iem
     * @return HasOne<Product, CartItems>
     */
    function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }
}
