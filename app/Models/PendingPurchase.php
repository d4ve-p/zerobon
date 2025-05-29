<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendingPurchase extends Model
{
    //
    protected $fillable = [
        "address",
        "user_id",
        "total"
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function items(): HasMany {
        return $this->hasMany(PendingPurchaseItem::class);
    }
}
