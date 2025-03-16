<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CartItems extends Model
{
    //
    protected $fillable = [
        "quantity"
    ];

    /**
     * Relationships
     */
    /**
     * Get the product for the cart iem
     * @return HasOne<Product, CartItems>
     */
    function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
