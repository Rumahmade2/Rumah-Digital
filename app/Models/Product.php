<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Wishlist;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function orders()
    {
        return $this->hasMany(ProductOrders::class);
    }

    public function salesCount()
    {
        return $this->orders()->where('is_paid', true)->count();
    }

    public function isWishlisted()
    {
        if (!auth()->check()) return false;
        return Wishlist::where('user_id', auth()->id())->where('product_id', $this->id)->exists();
    }

    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?: 0;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    protected function coverUrl(): Attribute
    {
        return Attribute::get(function () {
            $cover = $this->cover;

            if (! $cover) {
                return asset('images/thumbnails/img1.png');
            }

            if (str_starts_with($cover, 'images/') || str_starts_with($cover, '/')) {
                return asset($cover);
            }

            return asset('storage/'.$cover);
        });
    }
}

