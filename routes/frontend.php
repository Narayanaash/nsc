<?php

use Illuminate\Support\Facades\Route;


Route::get('/clear-cache', function() {
    Artisan::call('optimize:clear');
    return "<center><h1 style='text-transform: uppercase; text-align: center; padding: 15px 20px; margin-top: 5%; font-family: sans-serif; font-size: 50px; color: #fff; background-color: green; display: inline-block; border-radius: 10px;'>cache cleared!</h1></center>";
});

// hashed password generator lifecare123
Route::get('/hash/{password}', function($password) {
    $password = Hash::make($password);
    return $password;
});


// Member Login Control
Route::get('/customer/login', 'Customer\CustomerLoginController@showCustomerLoginForm')->name('customer.login');
Route::post('/customer/login', 'Customer\CustomerLoginController@CustomerLogin')->name('login.customer');
Route::post('/customer/logout', 'Customer\CustomerLoginController@logout')->name('customer.logout');
// Customer Reguster
Route::post('/add/customer', 'Customer\RegistrationController@addCustomer')->name('add.customer');
// Add To Cart
Route::get('/add/to/cart/{id}', 'Customer\ProductController@getAddToCart')->name('product.add_to_cart');
Route::patch('update-cart', 'Customer\ProductController@update');
Route::delete('remove-from-cart', 'Customer\ProductController@remove');

Route::get('/shopping-cart', 'Customer\ProductController@cart')->name('frontend.cart');

Route::group(['middleware'=>'auth:customer','prefix'=>'customer','namespace'=>'Customer'],function(){
    Route::get('/home', 'HomeController@index')->name('frontend.home');
    Route::get('/checkout', 'ProductController@getCheckout')->name('product.checkout');
    Route::post('/add/address', 'ProductController@addAddress')->name('customer.address');
    Route::post('/add/order', 'ProductController@addOrder')->name('customer.order');
    Route::get('/thank-you/{token}', 'ProductController@thankYou')->name('customer.thank_you');
    Route::get('/user-orders', 'ProductController@userOrder')->name('frontend.orders');
    Route::get('/user-query', 'ProductController@userQuery')->name('frontend.query');
    
});
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

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about');

Route::get('/promotion', function () {
    return view('frontend.pages.promotion');
})->name('promotion');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact');

// Route::get('/shopping-cart', 'Customer\ProductController@getCart')->name('frontend.cart');

Route::get('/user-login', function () {
    return view('frontend.pages.login');
})->name('frontend.login');

Route::get('/user-register', function () {
    return view('frontend.pages.register');
})->name('frontend.register');

Route::get('/user-profile', function () {
    return view('frontend.pages.userprofile');
})->name('frontend.userprofile');





Route::get('/delivery', function () {
    return view('frontend.pages.delivery');
})->name('delivery');

Route::get('/privacy-policy', function () {
    return view('frontend.pages.privacy-policy');
})->name('privacy_policy');

Route::get('/terms-and-conditions', function () {
    return view('frontend.pages.terms-and-conditions');
})->name('terms_and_conditions');

Route::get('/return-and-refund-policy', function () {
    return view('frontend.pages.return-and-refund-policy');
})->name('return_and_refund_policy');


Route::namespace('Frontend')->group(function () {
    Route::namespace('Category')->group(function () {
        Route::get('/buy', 'CategoryController@index')->name('frontend.category');
    });
        Route::get('/buy/products/{category_id}', 'Product\ProductController@index')->name('frontend.products');
        Route::get('/buy/products/checkout/{p_id}', 'Checkout\ProductController@index')->name('frontend.checkout');
        // ajax route
        Route::post('/checkout/submit/{p_id}', 'Checkout\CheckoutController@store')->name('frontend.checkout.submit');
        Route::post('/query/submit/', 'Query\QueryController@store')->name('frontend.query.submit');
        Route::get('/product-search/{keyword}', 'Productsearch\AjaxSearchController@get')->name('frontend.ajax.product.search');
    Route::namespace('Home')->group(function() {
        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('frontend.home');
    });
});