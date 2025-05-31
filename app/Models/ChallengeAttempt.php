<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChallengeAttempt extends Model
{
    //
    protected $fillable = [
        "user_id",
        "challenge_id",
        "submission_image_path",
        "is_approved"
    ];

    function challenge(): BelongsTo {
        return $this->belongsTo(Challenge::class);
    }

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
