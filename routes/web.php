<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin/', 'AdminController@index')->name('admin.dashboard');
    
    Route::get('/admin/products/create', 'ProductController@create')->name('admin.product.create');
    Route::post('/admin/products', 'ProductController@store');
    Route::get('/admin/products', 'ProductController@index')->name('admin.products');
    Route::get('/admin/products/{product}/edit', 'ProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{product}', 'ProductController@update');

    Route::post('/admin/category', 'CategoryController@store');
    Route::delete('/admin/category/{category}', 'CategoryController@destroy');
    Route::get('/admin/category/create', 'CategoryController@create')->name('admin.category.create');
});

Route::get('/', 'ProductController@shop')->name('product.shop');
Route::get('/categories', function () {
    return view('shop.categories');
})->name('shop.categories');

Route::get('/profile', 'ProfileController@index')->name('profile.index');

Route::get('/shop/{product}', 'ProductController@show')->name('product.show');
Route::post('/vueShop', 'ProductController@vueShop');
Route::post('/latest', 'ProductController@latestProducts');

Route::post('/cart/{product}', 'CartController@store');
Route::delete('/cart/{product}', 'CartController@destroy');
Route::post('/cart', 'CartController@show');

Route::get('/checkout', 'CartController@index')->name('cart.index');
Route::post('/checkout', 'CheckoutController@checkout');

Route::post('/categories', 'CategoryController@index');
Route::post('/category/{category}', 'CategoryController@show');

Route::get('/home', 'HomeController@index')->name('home');
