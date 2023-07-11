<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materials = Product::productMaterials;
        $statuses = Product::productStatus;
        $sizes = Product::productSizes;
        $colors = Product::productColors;
        
        $categories = Category::pluck('name', 'id'); // Retrieve all categories for dropdown
        $sub_categories = SubCategory::pluck('name', 'id'); // Retrieve all subcategories for dropdown

        return view('admin.product.create', compact('materials', 'sizes', 'colors', 'statuses', 'categories', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        $data = [
            'category_id' => $request->category_id,
            'category_name' => $request->category_id ? Category::findOrFail($request->category_id)->name : null,
            'sub_category_id' => $request->sub_category_id,
            'sub_category_name' => $request->sub_category_id ? SubCategory::findOrFail($request->sub_category_id)->name : null,
            'number' => $request->product_no,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => strip_tags($request->description),
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'images' => $request->images,
            'qty' => $request->qty,
            'material' => $request->material,
            'tax' => $request->tax,
            'status' => $request->status ?? 'Unavailable',
            'trending' => $request->has('trending') ? 1 : 0,
            'popular' => $request->has('popular') ? 1 : 0,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => $request->meta_keywords,
        ];

        // Create the product instance
        $product = Product::create($data);

        // Get selected sizes and colors from the request
        $selectedSizes = $request->input('sizes', []);
        $selectedColors = $request->input('colors', []);

        // Get the names of selected sizes and colors
        $selectedSizeNames = array_intersect_key(Product::productSizes, array_flip($selectedSizes));
        $selectedColorNames = array_intersect_key(Product::productColors, array_flip($selectedColors));

        // Update the product with selected size and color names
        $product->size = implode(', ', $selectedSizeNames);
        $product->color = implode(', ', $selectedColorNames);
        $product->save();

        return redirect()->route('product.index', compact('product'))
            ->with('status', 'Product Inserted Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $materials = Product::productMaterials;
        $statuses = Product::productStatus;
        $sizes = Product::productSizes;
        $colors = Product::productColors;

        $categories = Category::pluck('name', 'id'); // Retrieve all categories for dropdown
        $sub_categories = SubCategory::pluck('name', 'id'); // Retrieve all subcategories for dropdown

        return view('admin.product.edit', compact('product', 'materials', 'sizes', 'colors', 'statuses', 'categories', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();
        
        // Delete the previous images if new images are provided or if existing images are removed
        $existingImages = json_decode($product->images);
        $newImages = $request->images ? json_decode($request->images) : [];

        $removedImages = array_diff($existingImages, $newImages);

        if (!empty($removedImages)) {
            foreach ($removedImages as $removedImage) {
                Storage::disk('public')->delete($removedImage);
            }
        }

        $data = [
            'category_id' => $request->category_id,
            'category_name' => $request->category_id ? Category::findOrFail($request->category_id)->name : null,
            'sub_category_id' => $request->sub_category_id,
            'sub_category_name' => $request->sub_category_id ? SubCategory::findOrFail($request->sub_category_id)->name : null,
            'number' => $request->product_no,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => strip_tags($request->description),
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'images' => $request->images,
            'qty' => $request->qty,
            'material' => $request->material,
            'tax' => $request->tax,
            'status' => $request->status ?? 'Unavailable',
            'trending' => $request->has('trending') ? 1 : 0,
            'popular' => $request->has('popular') ? 1 : 0,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => $request->meta_keywords,
        ];

        $product->update($data);

        // Get selected sizes and colors from the request
        $selectedSizes = $request->input('sizes', []);
        $selectedColors = $request->input('colors', []);

        // Get the names of selected sizes and colors
        $selectedSizeNames = array_intersect_key(Product::productSizes, array_flip($selectedSizes));
        $selectedColorNames = array_intersect_key(Product::productColors, array_flip($selectedColors));

        // Update the product with selected size and color names
        $product->size = implode(', ', $selectedSizeNames);
        $product->color = implode(', ', $selectedColorNames);
        $product->save();

        return redirect()->route('product.index', compact('product'))->with('status', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete($product);
        return redirect()->route('product.index')->with('status',"Product Deleted Successfully");
    }

    // Image Upload Function
    public function imageUpload(Request $request)
    {
        // Validate the uploaded image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3MB
        ]);

        $file = $request->file('image');
        $path = $file->store('product', 'public');

        // Check if the file was successfully stored
        if ($path) {
            return response()->json([
                'status' => true,
                'image' => $path
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Image upload failed'
            ]);
        }
    }

    
    /**
     * AJAX endpoint to fetch related sub-categories for a given category.
     */
    public function getSubcategories(Request $request, $category_id)
    {
        $sub_categories = SubCategory::where('category_id', $category_id)->pluck('name', 'id');
        return response()->json($sub_categories);
    }
}
