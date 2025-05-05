<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    //
    protected $fillable = [
        "donationValue"
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
