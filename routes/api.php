<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['json.response']], function (){

    Route::group(['middleware' => ['auth:api']], function () {

        Route::get('/logout', 'Api\AuthController@logout')->name('logout.api');

        Route::get('/user', function (Request $request) {
            return $request->user();
        });

        Route::get('product', 'Api\ProductController@index')->name('api.product.list');
        Route::post('product', 'Api\ProductController@store')->name('api.product.store');
        Route::post('product', 'Api\ProductController@update')->name('api.product.update');
        Route::delete('product/{productId}', 'Api\ProductController@destroy')->name('api.product.delete');
        Route::get('product/{productId}', 'Api\ProductController@show')->name('api.product');
    });

    Route::post('/register', 'Api\AuthController@register')->name('register.api');

    Route::post('/login', 'Api\AuthController@login')->name('login.api');
});
