<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    //
    protected $fillable = [
        'message'
    ];

    /**
     * Relationships
     */
    /**
     * Returns the forum where the reply was made
     * @return BelongsTo<Forum, Reply>
     */
    function forum(): BelongsTo
    {
        return $this->belongsTo(Forum::class);
    }
    /**
     * Return the author of the reply
     * @return BelongsTo<User, Reply>
     */
    function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
