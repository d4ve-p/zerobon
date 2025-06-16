<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    /**
     * Relationship
     */
    /**
     * Get the user the cart belongs to
     * @return BelongsTo<User, Cart>
     */
    protected $fillable = [
        "user_id"
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the items inside the cart
     * @return HasMany<CartItems, Cart>
     */
    function items(): HasMany
    {
        return $this->hasMany(CartItems::class);
    }

    function vouchers(): HasMany
    {
        return $this->hasMany(CartUserVouchers::class);
    }

    function calculateTotalPrice()
    {
        $total = 0;
        foreach($this->items()->with('product')->get() as $item) {
            if($item->product) {
                $total += $item->quantity * $item->product->price;
            }
        }

        return $total;
    }
}
