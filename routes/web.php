<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Define the route for the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Define routes with middleware for authenticated users and admin role
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::prefix('/dashboard')->group(function () {
    //Categories CRUD
        Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
        Route::prefix('/category')->group(function(){
            Route::get('/add',[CategoryController::class, 'create'])->name('category.create');
            Route::post('/add',[CategoryController::class, 'store'])->name('category.store');
            Route::get('/{category}/edit',[CategoryController::class, 'edit'])->name('category.edit');
            Route::put('/{category}/edit',[CategoryController::class, 'update'])->name('category.update');
            Route::delete('/{category}/delete',[CategoryController::class, 'destroy'])->name('category.destroy');
            Route::post('/image-upload', [CategoryController::class, 'imageUpload'])->name('category.image.upload');
        });
    });
});

// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

require __DIR__.'/auth.php';
Auth::routes();
