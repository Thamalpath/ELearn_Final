<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('category_name');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('sub_category_name');
            $table->string('number', 10)->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->text('images');
            $table->string('qty');
            $table->string('material');
            $table->string('size')->nullable()->default(null);
            $table->string('color')->nullable()->default(null);
            $table->string('tax')->nullable();
            $table->string('status', 50)->default('Unavailable');
            $table->tinyInteger('trending')->default(0)->nullable();
            $table->tinyInteger('popular')->default(0)->nullable();
            $table->mediumText('meta_title');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
