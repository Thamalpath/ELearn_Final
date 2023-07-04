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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('number', 10)->unique();
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('status', 50)->default('Unavailable'); // Reduce the length to fit within the limit
            $table->tinyInteger('popular')->default('0');
            $table->string('image')->nullable();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
