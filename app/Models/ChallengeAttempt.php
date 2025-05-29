<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeAttempt extends Model
{
    //
    protected $fillable = [
        "user_id",
        "challenge_id",
        "submission_image_path",
        "is_approved"
    ];
}
