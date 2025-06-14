<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    //
    protected $fillable = [
        "user_id",
        "purchaseDate",
        "total",
        "status"
    ];

    /**
     * Relationships
     */
    /**
     * Get the user the purchase belongs to
     * @return BelongsTo<User, Purchase>
     */
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get purchase items
     * @return HasMany<PurchaseItem, Purchase>
     */
    public function purchaseItems(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
