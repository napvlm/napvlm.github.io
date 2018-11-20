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
// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::middleware('auth')->group(function () {

	Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

	Route::group(['as' => 'admin.'], function () {
		Route::resource('/admin/shops', 'Admin\ShopController');
		Route::resource('/admin/orders', 'Admin\OrderController');
		Route::resource('/admin/products', 'Admin\ProductController');
		Route::resource('/admin/callbacks', 'Admin\CallbackController');
		Route::resource('/admin/texts', 'Admin\TextBlockController');
		Route::resource('/admin/links', 'Admin\LinkBlockController');
	});

});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'HomeController@getProducts')->name('getProducts');

Route::get('/about_us', 'HomeController@getAboutUs')->name('getAboutUs');

Route::get('/contacts', 'HomeController@getContacts')->name('getContacts');

Route::post('/callback', 'HomeController@postCallback')->name('postCallback');
Route::post('/buy-one-click', 'HomeController@postBuyOneClick')->name('postBuyOneClick');

