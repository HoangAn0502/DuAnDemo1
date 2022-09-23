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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/', 'HomeController@index');
//only chỉ sử dụng các phương thức ('pt1', 'pt2', .....)
//except trừ ra phương thức('pt1', 'pt2', .....) || k sử dụng phương thức('pt1', 'pt2', .....)
//Route::resource('customer', 'Api\v1\CustomerController')->only('index', 'show', 'update', 'destroy', 'store');

Route::prefix('v1')->group(function(){
    Route::resource('customer', 'Api\v1\CustomerController')->only('show', 'update', 'destroy', 'store');

    Route::resource('customer', 'Api\v1\CustomerController')->only('index');

    Route::resource('category', 'Api\v1\CategoryPostController');

    Route::resource('post', 'Api\v1\PostController');


});


Route::prefix('v2')->group(function(){
    Route::resource('customer', 'Api\v2\CustomerController')->only('show');
});

    
