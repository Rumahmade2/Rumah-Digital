<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;




class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user && $user->isAdmin()) {
            $products = Product::with(['category', 'creator'])->latest()->get();
        } else {
            $products = Product::where('creator_id', Auth::id())->with(['category', 'creator'])->latest()->get();
        }

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $categories = Category::all();
          return view('admin.products.create', [
            'categories'=> $categories
          ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'about' => ['required', 'string', 'max:65535'],
            'path_file' => ['required', 'file', 'mimes:zip', 'max:40960'],
            'price' => ['required', 'integer', 'min:0'],
            'original_price' => ['nullable', 'integer', 'min:0'],
            'category_id' => ['required', 'integer'],
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('product_covers', 'public');
                $validate['cover'] = $coverPath;
            }
            if ($request->hasFile('path_file')) {
                $path_filePath = $request->file('path_file')->store('product_path_file', 'public');
                $validate['path_file'] = $path_filePath;
            }
            $validate['slug'] = Str::slug($validate['name'] . '-' . Str::random(5));
            $validate['creator_id'] = Auth::id();




            $newProduct = Product::create($validate);
            DB::commit();

            return redirect()->route('admin.products.index')->with('success','Product created successfully');
            
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System error' . $e->getMessage()],
        
        ]);
            throw $error;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product->creator_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
         return view('admin.products.edit',[
            'product' => $product,
            'categories' => $categories
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product->creator_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cover' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4096'],
            'about' => ['required', 'string', 'max:65535'],
            'path_file' => ['sometimes', 'file', 'mimes:zip', 'max:40960'],
            'price' => ['required', 'integer', 'min:0'],
            'original_price' => ['nullable', 'integer', 'min:0'],
            'category_id' => ['required', 'integer'],
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('product_covers', 'public');
                $validate['cover'] = $coverPath;
            }

            if ($request->hasFile('path_file')) {
                $path_filePath = $request->file('path_file')->store('product_path_file', 'public');
                $validate['path_file'] = $path_filePath;
            }

            $product->update($validate);


            DB::commit();

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                'system_error' => ['System error: ' . $e->getMessage()],
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $user = Auth::user();
        if (!$user->isAdmin() && $product->creator_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success','Product deleted successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            $error = ValidationException::withMessages([
                'system_error' => ['System error' . $e->getMessage()],
        
        ]);
            throw $error;
        }
    }
}
