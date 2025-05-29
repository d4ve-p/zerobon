<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendingPurchaseItem extends Model
{
    protected $fillable = [
        "pending_purchase_id",
        "product_id",
        "quantity",
        "product_price",
    ];
    //
    function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    function pendingPurchase(): BelongsTo {
        return $this->belongsTo(PendingPurchase::class);
    }
}
