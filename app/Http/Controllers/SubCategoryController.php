<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubCategoryRequest;
use App\Http\Requests\UpdateSubCategoryRequest;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_categories = SubCategory::all();

        return view('admin.sub_category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = SubCategory::SubcategoryStatus;
        return view('admin.sub_category.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $data = [
            'number' => $request->sub_category_no,
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

        $sub_category = new SubCategory();
        SubCategory::create($data);
        return redirect()->route('sub_category.index', compact('sub_category'))->with('status',"Sub Category Inserted Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $sub_category)
    {
        $sub_category = SubCategory::find($sub_category->id);
        $statuses = SubCategory::SubcategoryStatus;
        return view('admin.sub_category.edit', compact('sub_category', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, SubCategory $sub_category)
    {
        // Delete the previous image if a new image is provided
        if($request->image != $sub_category->image && !empty($sub_category->image)){
            Storage::disk('public')->delete($sub_category->image);
        }
        $data = [
            'number' => $request->sub_category_no,
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

        $sub_category->update($data);
        return redirect()->route('sub_category.index')->with('status',"Sub Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $sub_category)
    {
        $sub_category->delete($sub_category);
        return redirect()->route('sub_category.index')->with('status',"Sub Category Deleted Successfully");
    }

    // Image Upload Function
    public function imageUpload(Request $request){
        // Validate the uploaded image file
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072', // 3MB
        ]); 
        $file = $request->file('image');
        $path = $file->store('sub_category', 'public');

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
