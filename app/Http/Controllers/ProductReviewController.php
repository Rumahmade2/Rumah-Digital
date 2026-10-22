<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\ProductOrders;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->isAdmin()) {
            // Admin can see all reviews
            $reviews = ProductReview::whereHas('product')->with(['product', 'user'])->latest()->get();
        } else {
            // Sellers see only reviews for their products
            $reviews = ProductReview::whereHas('product', function($query) {
                $query->where('creator_id', Auth::id());
            })->with(['product', 'user'])->latest()->get();
        }

        return view('admin.product_reviews.index', compact('reviews'));
    }

    public function destroy(ProductReview $productReview)
    {
        $user = Auth::user();
        // Ensure the current user owns the product being reviewed OR is an Admin
        if (!$user->isAdmin() && $productReview->product->creator_id !== $user->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $productReview->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:10',
        ]);

        // Check if user has purchased the product and it's paid
        $hasPurchased = ProductOrders::where('buyer_id', Auth::id())
            ->where('product_id', $productId)
            ->where('is_paid', true)
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'You can only review products you have purchased.');
        }

        // Check if already reviewed
        $alreadyReviewed = ProductReview::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->exists();

        if ($alreadyReviewed) {
             return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        ProductReview::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
