<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\WebCheckoutController;
use App\Http\Controllers\WebProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebCartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;


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

// Handle product cart
Route::post('add-to-cart', [WebCartController::class, 'addProduct']);
Route::post('delete-cart-item', [WebCartController::class, 'deleteProduct']);
Route::post('/clear-cart', [WebCartController::class, 'clearCart']);
Route::post('update-cart', [WebCartController::class, 'updateCart']);

Route::middleware('auth')->group(function () {
    Route::get('cart', [WebCartController::class, 'viewCart'])->name('cart');
    Route::get('checkout', [WebCheckoutController::class, 'index']);
    Route::get('validate-cart-products', [WebCartController::class, 'validateCartProducts']);
    Route::post('place-order', [WebCheckoutController::class, 'placeOrder']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Define routes with middleware for authenticated users and admin role
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
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

    //Sub Categories CRUD
    Route::get('/sub_categories', [SubCategoryController::class, 'index'])->name('sub_category.index');
    Route::prefix('/sub_category')->group(function(){
        Route::get('/add',[SubCategoryController::class, 'create'])->name('sub_category.create');
        Route::post('/add',[SubCategoryController::class, 'store'])->name('sub_category.store');
        Route::get('/{sub_category}/edit',[SubCategoryController::class, 'edit'])->name('sub_category.edit');
        Route::put('/{sub_category}/edit',[SubCategoryController::class, 'update'])->name('sub_category.update');
        Route::delete('/{sub_category}/delete',[SubCategoryController::class, 'destroy'])->name('sub_category.destroy');
        Route::post('/image-upload', [SubCategoryController::class, 'imageUpload'])->name('sub_category.image.upload');
    });
    
    //Products CRUD
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::prefix('/product')->group(function(){
        Route::get('/add',[ProductController::class, 'create'])->name('product.create');
        Route::post('/add',[ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}/edit',[ProductController::class, 'edit'])->name('product.edit');
        Route::put('/{product}/edit',[ProductController::class, 'update'])->name('product.update');
        Route::delete('/{product}/delete',[ProductController::class, 'destroy'])->name('product.destroy');
        Route::post('/image-upload', [ProductController::class, 'imageUpload'])->name('product.image.upload');
        Route::get('/get-subcategories/{category_id}', [ProductController::class, 'getSubcategories'])->name('product.get.subcategories');
    });
});

// Show all products listing & show individual product details
Route::get('/all-products', [WebProductController::class, 'index'])->name('all.products');
Route::get('/product/{slug}', [WebProductController::class, 'show'])->name('product.show');

// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

require __DIR__.'/auth.php';
Auth::routes();
