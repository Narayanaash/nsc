<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/frontend.php';

Route::group(['prefix' => 'admin'], function() {
Auth::routes([
    'register' => false,
    ]);
});

Route::get('/register', function () {
    return view('frontend.pages.index');
});

Route::middleware(['auth'])->group(function () {

Route::get('/admin/home', 'HomeController@index')->name('home');

Route::get('/admin/home/product-order-detail', function() {
    return view('admin.auth.product.productdetail');
});

Route::namespace('Auth')->group(function () {

        // ajax route
        Route::post('/password/reset', 'Password\PasswordResetController@update')->name('password.reset');

        Route::namespace('Product')->group(function () {
            Route::get('/admin/home/product/upload-view', 'ProductController@index')->name('product.upload-view');
            Route::get('/admin/home/product/update-view/{id}', 'ProductController@updateShow')->name('product.update_view');
            Route::put('/admin/home/product/store', 'ProductController@store')->name('product.store');
            Route::put('/admin/home/product/update/{id}', 'ProductController@update')->name('product.update');
            Route::get('/admin/home/product/view/{catgory}', 'ProductController@show')->name('product.show');
            Route::get('/admin/home/product/delete/{id}', 'ProductController@delete')->name('product.delete');
            Route::get('/admin/home/product/single-view/{id}', 'ProductController@singleView')->name('product.single_view');
            // ajax route
            Route::post('/home/blog/get-data/{c_id}', 'ProductController@get')->name('product.get_data');
        });

        Route::namespace('Category')->group(function () {
            Route::get('/admin/home/category/upload-view', 'CategoryController@index')->name('category.upload-view');
            Route::get('/admin/home/category/update-view/{id}', 'CategoryController@updateShow')->name('category.update_view');
            Route::put('/admin/home/category/update/{id}', 'CategoryController@update')->name('category.update');
            Route::put('/admin/home/category/store', 'CategoryController@store')->name('category.store');
            Route::get('/admin/home/category/view', 'CategoryController@show')->name('category.show');
            Route::get('/admin/home/category/delete/{id}', 'CategoryController@delete')->name('category.delete');
            // ajax route
            Route::post('/admin/home/category/get-data', 'CategoryController@get')->name('category.get_data');
        });

        Route::namespace('Qoutations')->group(function() {
            Route::get('/admin/home/qoutations/view', 'QoutationController@show')->name('qoutations.show');
            Route::get('/admin/home/qoutations/delete/{id}', 'QoutationController@delete')->name('qoutations.delete');
            Route::get('/admin/home/qoutations/reject/{id}', 'QoutationController@reject')->name('qoutations.reject');
            // ajax route
            Route::get('/admin/home/qoutations/get-data', 'QoutationController@get')->name('qoutations.get_data');
            Route::get('/admin/home/qoutations/view-data/{id}', 'QoutationController@view')->name('qoutations.view');
            Route::post('/admin/home/qoutations/price-update', 'QoutationController@priceUpdate')->name('qoutations.price_update');
            
        });

        Route::namespace('Orders')->group(function() {
            Route::get('/admin/home/orders/view', 'OrdersController@show')->name('orders.show');
            Route::get('/admin/home/orders/delete/{id}', 'OrdersController@delete')->name('orders.delete');
            // ajax route
            Route::post('/admin/home/orders/get-data', 'OrdersController@get')->name('orders.get_data');
            Route::get('/admin/home/orders/view-data/{id}', 'OrdersController@view')->name('orders.view');
            Route::post('/admin/home/orders/price-update', 'OrdersController@priceUpdate')->name('order.price_update');
            
        });

        Route::namespace('Queries')->group(function() {
            Route::get('/admin/home/queries/view', 'QueryController@show')->name('queries.show');
            Route::get('/admin/home/queries/delete/{id}', 'QueryController@delete')->name('queries.delete');
            // ajax route
            Route::post('/admin/home/queries/get-data', 'QueryController@get')->name('queries.get_data');
        });
    });
});
