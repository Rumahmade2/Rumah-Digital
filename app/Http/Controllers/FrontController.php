<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class FrontController extends Controller
{
    public function creator(User $user)
    {
        $user->loadCount('products');
        $products = $user->products()->with(['category', 'creator'])->latest()->get();

        return view('front.creator', compact('user', 'products'));
    }

    public function index()
    {
        $products = Product::with(['category', 'creator', 'reviews'])->latest()->get();
        $categories = Category::all();
        $topCreators = User::withCount('products')
            ->orderBy('products_count', 'desc')
            ->take(4)
            ->get();

        return view("front.index", compact("products", "categories", "topCreators"));
    }

    public function details(Product $product)
    {
        $product->load([
            'category',
            'creator' => function ($query) {
                $query->withCount('products');
            },
            'reviews.user'
        ]);

        $canReview = false;
        if (\Auth::check()) {
            $hasPurchased = \App\Models\ProductOrders::where('buyer_id', \Auth::id())
                ->where('product_id', $product->id)
                ->where('is_paid', true)
                ->exists();

            $alreadyReviewed = \App\Models\ProductReview::where('user_id', \Auth::id())
                ->where('product_id', $product->id)
                ->exists();

            $canReview = $hasPurchased && !$alreadyReviewed;
        }

        $moreProducts = Product::with(['category', 'creator'])
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(6)
            ->get();

        return view('front.details', compact('product', 'moreProducts', 'canReview'));
    }

    public function category(Category $category, Request $request)
    {
        $sort = $request->query('sort', 'latest');
        $query = $category->products()->with(['creator', 'category', 'reviews']);

        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'top_rated':
                $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();
        return view('front.category', compact('category', 'products', 'sort'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sort = $request->query('sort', 'latest');
        $productsQuery = Product::with(['category', 'creator', 'reviews'])
            ->where('name', 'LIKE', "%{$query}%");

        switch ($sort) {
            case 'price_low':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_high':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'top_rated':
                $productsQuery->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                break;
            default:
                $productsQuery->latest();
                break;
        }

        $products = $productsQuery->get();
        return view('front.search', compact('products', 'query', 'sort'));
    }

    public function liveSearch(Request $request)
    {
        $query = $request->input('query');
        if (empty($query)) {
            return response()->json([]);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->take(5)
            ->get();

        $results = $products->map(function ($product) {
            return [
                'name' => $product->name,
                'slug' => $product->slug,
                'cover_url' => $product->cover_url, // Using Attribute from model
                'price' => 'Rp ' . number_format($product->price, 0, ',', '.'),
                'original_price' => $product->original_price > 0 ? 'Rp ' . number_format($product->price + $product->original_price, 0, ',', '.') : null,
                'url' => route('front.details', $product->slug),
            ];
        });

        return response()->json($results);
    }
    public function stories()
    {
        return view('front.stories');
    }

    public function benefits()
    {
        return view('front.benefits');
    }

    public function about()
    {
        return view('front.about');
    }
}
