<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'category_id',
        'category_name',
        'sub_category_id',
        'sub_category_name',
        'number',
        'name',
        'slug',
        'description',
        'original_price',
        'selling_price',
        'images',
        'qty',
        'material',
        'size',
        'color',
        'tax',
        'status',
        'trending',
        'popular',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    

    // Define the available options for material
    const productMaterials = [
        'Cotton' => 'Cotton',
        'Polyester' => 'Polyester',
        'Wool' => 'Wool',
        'Silk' => 'Silk',
        'Leather' => 'Leather',
    ];


    // Define the available options for status
    const productStatus = [
        'Available' => 'Available',
        'Out of Stock' => 'Out of Stock',
    ];


    // Define the available options for sizes
    const productSizes = [
        'XS' => 'XS',
        'S' => 'S',
        'M' => 'M',
        'L' => 'L',
        'XL' => 'XL',
        'XXL' => 'XXL',
        'XXXL' => 'XXXL',
    ];
    

    // Define the available options for colors
    const productColors = [
        'Red' => 'Red',
        'Pink' => 'Pink',
        'Purple' => 'Purple',
        'Blue' => 'Blue',
        'Green' => 'Green',
        'Yellow' => 'Yellow',
        'Orange' => 'Orange',
        'Brown' => 'Brown',
        'Black' => 'Black',
        'Grey' => 'Grey',
        'White' => 'White',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'prod_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}



