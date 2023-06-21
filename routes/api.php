<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V2\cartController as CartsV2;

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
