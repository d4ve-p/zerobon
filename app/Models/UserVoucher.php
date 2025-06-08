<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserVoucher extends Model
{
    //
    protected $fillable = [
        "user_id",
        "voucher_id",
        "start_date",
        "end_date",
    ];

    protected $casts = [
        'start_date' => 'date', 
        'end_date' => 'date',
    ];

    function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    function voucher(): BelongsTo
    {
        return $this->belongsTo(Voucher::class);
    }
}
