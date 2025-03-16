<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PurchaseItem extends Model
{
    //
    protected $fillable = [
        "productId",
        "quantity",
        "productPrice"
    ];
    /**
     * Relationships
     */
    /**
     * Get the purchase the purchaseItems belongs to
     * @return BelongsTo<Purchase, PurchaseItem>
     */
    function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }
    /**
     * Get the product of the purchased item
     * @return HasOne<Product, PurchaseItem>
     */
    function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }
}
