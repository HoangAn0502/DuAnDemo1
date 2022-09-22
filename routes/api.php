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

//only chỉ sử dụng các phương thức ('pt1', 'pt2', .....)
//except trừ ra phương thức('pt1', 'pt2', .....) || k sử dụng phương thức('pt1', 'pt2', .....)
Route::resource('customer', 'CustomerController')->only('index', 'show', 'update', 'delete', 'store');


    
