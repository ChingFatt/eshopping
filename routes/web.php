<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'uses' => 'PageController@home',
])->name('home');

Auth::routes();

Route::group(['namespace' => 'Admin', 'prefix' => 'admin/dashboard', 'as' => 'admin.dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'DashboardController@index',
    ]);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('product','ProductController');
});

Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
    Route::get('{slug}', [
        'as' => 'show',
        'uses' => 'ProductController@show',
    ]);
});

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
	Route::get('/', [
        'as' => 'index',
        'uses' => 'CartController@index',
    ]);
    Route::post('store', [
        'as' => 'store',
        'uses' => 'CartController@store',
    ]);
    Route::get('/clear', [
        'as' => 'clear',
        'uses' => 'CartController@clear',
    ]);
    Route::get('/remove/{id}', [
        'as' => 'remove',
        'uses' => 'CartController@remove',
    ]);
});

Route::group(['prefix' => 'checkout', 'as' => 'checkout.', 'middleware' => ['auth']], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'CheckoutController@index',
    ]);
    Route::post('store', [
        'as' => 'store',
        'uses' => 'CheckoutController@store',
    ]);
    Route::get('/success', [
        'as' => 'success',
        'uses' => 'CheckoutController@success',
    ]);
});