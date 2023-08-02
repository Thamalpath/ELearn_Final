<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = Category::categoryStatus;
        return view('admin.category.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = [
            'number' => $request->category_no,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => strip_tags($request->description), //Strip_tags - Remove <p> Tag
            'status' => $request->status ?? 'Unavailable',
            'popular' => $request->has('popular') ? 1 : 0, //Pass 1 & 0 using checkbox
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description), //Strip_tags - Remove <p> Tag
            'meta_keywords' => $request->meta_keywords,
        ];

        $category = new Category();
        Category::create($data);
        return redirect()->route('category.index', compact('category'))->with('status',"Category Inserted Successfully");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        $statuses = Category::categoryStatus;
        return view('admin.category.edit', compact('category', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Delete the previous image if a new image is provided
        if($request->image != $category->image && !empty($category->image)){
            Storage::disk('public')->delete($category->image);
        }
        $data = [
            'number' => $request->category_no,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => strip_tags($request->description), //Strip_tags - Remove <p> Tag
            'status' => $request->status ?? 'Unavailable',
            'popular' => $request->has('popular') ? 1 : 0, //Pass 1 & 0 using checkbox
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description), //Strip_tags - Remove <p> Tag
            'meta_keywords' => $request->meta_keywords,
        ];

        $category->update($data);
        return redirect()->route('category.index')->with('status',"Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete($category);
        return redirect()->route('category.index')->with('status',"Category Deleted Successfully");
    }

    // Image Upload Function
    public function imageUpload(Request $request){
        // Validate the uploaded image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3MB
        ]); 
        $file = $request->file('image');
        $path = $file->store('category', 'public');

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
