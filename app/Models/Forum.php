<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forum extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'date'
    ];

    /**
     * Relationships
     */
    /**
     * Returns the author of the forum
     * @return BelongsTo<User, Forum>
     */
    function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Returns the replies on the forum
     * @return HasMany<Reply, Forum>
     */
    function replies(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
