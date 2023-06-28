<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable = [
        'number',
        'cat_id',
        'sub_cat_id',
        'name',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'weight',
        'tax',
        'trending',
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

    // Define the available options for size
    const productSizes = [
        'XS' => 'XS',
        'S' => 'S',
        'M' => 'M',
        'L' => 'L',
        'XL' => 'XL',
        'XLL' => 'XLL',
    ];

    // Define the available options for color
    const productColors = [
        'Red' => 'Red',
        'Blue' => 'Blue',
        'Green' => 'Green',
        'Yellow' => 'Yellow',
        'Black' => 'Black',
        'White' => 'White',
    ];

    // Define the available options for status
    const productStatus = [
        'Available' => 'Available',
        'Out of Stock' => 'Out of Stock',
    ];
}

