<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateSubCategoryRequest;
use App\Http\Requests\StoreSubCategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

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
        $categories = Category::pluck('name', 'id');
        $statuses = SubCategory::SubcategoryStatus;
        return view('admin.sub_category.create', compact('categories', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $data = [
            'category_id' => $request->category_id, // Assign the selected category_id
            'category_name' => $request->category_id ? Category::findOrFail($request->category_id)->name : null,
            'number' => $request->sub_category_no,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => strip_tags($request->description),
            'status' => $request->status ?? 'Unavailable',
            'popular' => $request->has('popular') ? 1 : 0,
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => $request->meta_keywords,
        ];

        $sub_category = new SubCategory();
        $sub_category->fill($data);
        $sub_category->save();

        return redirect()->route('sub_category.index')->with('status', "Sub Category Inserted Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $sub_category)
    {
        $statuses = SubCategory::SubcategoryStatus;
        $categories = Category::pluck('name', 'id'); // Retrieve all categories for dropdown

        return view('admin.sub_category.edit', compact('sub_category', 'statuses', 'categories'));
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
            'description' => strip_tags($request->description),
            'status' => $request->status ?? 'Unavailable',
            'popular' => $request->has('popular') ? 1 : 0,
            'image' => $request->image,
            'meta_title' => $request->meta_title,
            'meta_description' => strip_tags($request->meta_description),
            'meta_keywords' => $request->meta_keywords,
        ];

        // Get the category name based on the selected category_id
        $category = Category::find($request->category_id);
        if ($category) {
            $data['category_id'] = $request->category_id;
            $data['category_name'] = $category->name;
        }

        $sub_category->update($data);
        return redirect()->route('sub_category.index')->with('status', "Sub Category Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $sub_category)
    {
        if($sub_category->delete()){
            return response()->json([
                'message' => 'Sub Category Deleted Successfully',
                'status' => true
            ]);
        }else{
            return response()->json([
                'message' => 'Unknown error occurred',
                'status' => false
            ]);
        }
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

    public function dataTable(Request $request)
    {
        $columns = [
            'id',
            'number',
            'category_name',
            'name',
            'description',
            'status',
            'image',
            'meta_title',
        ];

        $totalData = SubCategory::count();
        $totalFiltered = $totalData;

        $length = $request->input('length');
        $length = $length == -1 ? $totalData : $length;

        $searchValue = $request->input('search.value'); // Get search value

        // Query builder for searching
        $query = SubCategory::select($columns)
            ->orderBy($columns[$request->input('order.0.column')], $request->input('order.0.dir'));

        if (!empty($searchValue)) {
            $query->where(function ($query) use ($columns, $searchValue) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $searchValue . '%');
                }
            });

            $totalFiltered = $query->count();
        }

        $subCategories = $query->skip($request->input('start'))
            ->take($length)
            ->get();

        $data = [];
        foreach ($subCategories as $subCategory) {
            $data[] = [
                $subCategory->number,
                $subCategory->category_name,
                $subCategory->name,
                $subCategory->description,
                $subCategory->status,
                '<img src="' . asset('storage/' . $subCategory->image) . '" alt="Image" height="125px" width="90px">',
                $subCategory->meta_title,
                '<a href="'.route('sub_category.edit', $subCategory->id).'" class="btn btn-primary edit-btn ms-2 mt-2" data-id="'.$subCategory->id.'">Edit</a>
                <button type="button" class="btn btn-danger delete-btn" data-id="'.$subCategory->id.'">Delete</button>'  
            ];
        }

        $output = [
            "draw" => $request->draw,
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $data,
        ];

        return response()->json($output);
    }
}
