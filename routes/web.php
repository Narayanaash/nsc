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

Route::get('/admin/home', 'HomeController@index')->name('home');

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

        Route::namespace('Orders')->group(function() {
            Route::get('/admin/home/orders/view', 'OrdersController@show')->name('orders.show');
            Route::get('/admin/home/orders/delete/{id}', 'OrdersController@delete')->name('orders.delete');
            // ajax route
            Route::post('/admin/home/orders/get-data', 'OrdersController@get')->name('orders.get_data');
        });

        Route::namespace('Queries')->group(function() {
            Route::get('/admin/home/queries/view', 'QueryController@show')->name('queries.show');
            Route::get('/admin/home/queries/delete/{id}', 'QueryController@delete')->name('queries.delete');
            // ajax route
            Route::post('/admin/home/queries/get-data', 'QueryController@get')->name('queries.get_data');
        });
    });
