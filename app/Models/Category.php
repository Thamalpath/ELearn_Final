<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the fillable fields
    protected $fillable =[
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

    // Define category status options
    const categoryStatus = [
        'Available' => 'Available',
        'Unavailable' => 'Unavailable',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
