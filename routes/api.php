<?php

use Illuminate\Http\Request;
//use Symfony\Component\Routing\Route;

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


Route::prefix('auth')->group(function(){
    Route::post('register', 'AuthenticateController@register');
    Route::post('login', 'AuthenticateController@login');
    
    //Protected area. Just logged guy can loggedout!
    Route::middleware('auth:api')->group(function(){
        Route::post('logout', 'AuthenticateController@logout');
    });
});

Route::get('products', 'ProductController@index')->middleware('auth:api');