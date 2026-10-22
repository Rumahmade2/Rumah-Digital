<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkout(Product $product)
    {
        if (Auth::id() == $product->creator_id) {
            abort(403, 'You cannot checkout your own product.');
        }

        $product->load(['category', 'creator']);

        return view('front.checkout', compact('product'));
    }
}
