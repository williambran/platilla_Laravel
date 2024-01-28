<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\cartController as CartsV2;
use App\Http\Controllers\Api\V2\ProductController as ProductV2; 
use App\Http\Controllers\Api\V2\StockController as StockV2; 



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

Route::apiResource('v2/carts', CartsV2::class)
->only(['index','show','store','destroy']);

Route::apiResource('v2/product', ProductV2::class)
->only(['store','show','index','destroy']);
Route::post('/v2/product/{id}/recover','App\Http\Controllers\Api\V2\ProductController@recover');

//stock
Route::apiResource('v2/stock', StockV2::class)
->only(['store','show','index','destroy']);
Route::post('/v2/stock/{id}/recover','App\Http\Controllers\Api\V2\StockController@recover');







Route::group(['prefix' => 'v2/auth'], function(){
  Route::post('signup','AppController@signUp');
  Route::post('login', 'AppController@login');
});


//login-register-logout
Route::group(['middleware' => 'auth:api'],
 function(){
   Route::group(['prefix'=>'v2'], function(){
     Route::post('logout','AppController@logout');
     Route::get('user','AppController@user');
   });

 });


 //Route::post('logout','AppController@logout');
