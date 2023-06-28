<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materials = Product::productMaterials;
        $sizes = Product::productSizes;
        $colors = Product::productColors;
        $statuses = Product::productStatus;
        return view('admin.product.create', compact('materials', 'sizes', 'colors', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    // Image Upload Function
    public function imageUpload(Request $request){
        // Validate the uploaded image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3MB
        ]); 
        $file = $request->file('image');
        $path = $file->store('product', 'public');

        // Check if the file was successfully stored
        if($path){
            return response()->json([
                'status' => true,
                'image' => $path
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Image upload failed'
            ]);
        }
    }
}
