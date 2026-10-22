<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function iconUrl(): Attribute
    {
        return Attribute::get(function () {
            $icon = $this->icon;

            if (! $icon) {
                return asset('images/icons/cart.svg');
            }

            if (str_starts_with($icon, 'images/') || str_starts_with($icon, '/')) {
                return asset($icon);
            }

            return asset('storage/'.$icon);
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
