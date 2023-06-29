<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable =[
        'category_id',
        'category_name',
        'number',
        'name',
        'slug',
        'description',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    // Define sub_category status options
    const SubcategoryStatus = [
        'Available' => 'Available',
        'Unavailable' => 'Unavailable',
    ];
}
