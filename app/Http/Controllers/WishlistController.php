<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::whereHas('product')
            ->with(['product.category', 'product.creator'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('front.wishlist', compact('wishlists'));
    }

    public function toggle($productId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Product removed from wishlist');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist');
    }
}
