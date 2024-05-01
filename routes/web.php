<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
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
// homepage 
Route::get('/', [HomeController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/******************* admin *******************/

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth', 'verified');

// view category
Route::get('/view-category', [AdminController::class, 'view_category']);

// add category
Route::post('/add-category', [AdminController::class, 'add_category']);

// delete category
Route::get('/delete-category/{id}', [AdminController::class, 'delete_category']);

// update category
Route::get('/edit-category/{id}', [AdminController::class, 'edit_category']);
Route::post('/edit-category_confirm/{id}', [AdminController::class, 'edit_category_confirm']);

// view product 
Route::get('/view-product', [AdminController::class, 'view_product']);

// add product 
Route::post('/add-product', [AdminController::class, 'add_product']);

// show product
Route::get('/show-product', [AdminController::class, 'show_product']);

// delete product
Route::get('/delete-product/{id}', [AdminController::class, 'delete_product']);

// update product 
Route::get('/update-product/{id}', [AdminController::class, 'update_product']);
Route::post('/update-product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

// view order
Route::get('/order', [AdminController::class, 'order']);

// update status
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);



/******************* userpage *******************/
// review
Route::get('/review', [HomeController::class, 'review']);




// product detail
Route::get('/product-details/{id}', [HomeController::class, 'product_details']);

// add to cart
Route::post('/cart/{id}', [HomeController::class, 'add_cart']);

// show product from database to cart
Route::get('/show-cart', [HomeController::class, 'show_cart']);

// remove cart
Route::get('/remove-cart/{id}', [HomeController::class, 'remove_cart']);

// order 
Route::get('/cash-order', [HomeController::class, 'cash_order']);

// pay card
Route::get('/stripe/{formattedTotalPrice}', [HomeController::class, 'stripe']);

//  stripe 
Route::post('stripe/{formattedTotalPrice}', [HomeController::class, 'stripePost'])->name('stripe.post');

// show order
Route::get('/show-order', [HomeController::class, 'show_order']);

// cancel order
Route::get('/cancel-order/{id}', [HomeController::class, 'cancel_order']);

// view product
Route::get('/products', [HomeController::class, 'product']);