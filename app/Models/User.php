<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'address',
        'phone',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationships
     */
    /**
     * Get user shopping cart
     */
    function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }
    /**
     * Get user's purchases
     */
    function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * Checks if user has specified role
     * @param string $role
     * @return bool
     */
    function hasRole(string $role): bool {
        return $this->role === $role;
    }

    /**
     * Checks if user has one of the specified role
     * @param array $roles
     * @return bool
     */
    function hasAnyRole(array $roles): bool {
        return in_array($this->role, $roles);
    }
}
