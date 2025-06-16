<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartUserVouchers extends Model
{
    //
    protected $fillable = [
        "user_voucher_id",
        "cart_id",
    ];

    public function cart(): BelongsTo {
        return $this->belongsTo(Cart::class);
    } 

    public function user_voucher(): BelongsTo {
        return $this->belongsTo(UserVoucher::class);
    }
}
