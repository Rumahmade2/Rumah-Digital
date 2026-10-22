<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'name',
        'role',
        'email',
        'password',
        'avatar',
        'occupation',
        'bank_account',
        'bank_name',
        'bank_account_number',
    ];

    public function isSeller(): bool
    {
        return $this->role === 'penjual';
    }

    public function isBuyer(): bool
    {
        return $this->role === 'pembeli';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function createdOrders(): HasMany
    {
        return $this->hasMany(ProductOrders::class, 'creator_id');
    }

    public function boughtOrders(): HasMany
    {
        return $this->hasMany(ProductOrders::class, 'buyer_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'creator_id');
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtolower($value),
        );
    }

    protected function avatarUrl(): Attribute
    {
        return Attribute::get(function () {
            $avatar = $this->avatar;

            if (!$avatar) {
                return asset('images/default-avatar.svg');
            }

            if (str_starts_with($avatar, 'images/') || str_starts_with($avatar, '/')) {
                return asset($avatar);
            }

            return asset('storage/' . $avatar);
        });
    }

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
}
