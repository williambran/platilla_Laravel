<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModelProductController;
use App\Http\Controllers\ProveedorController;
use App\Models\ModelProduct;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('register', function (){
  return view('auth/register');
});
Route::get('login', function (){
  return view('auth/login');
});

Route::post('/register','AuthController@store')->name('register');
Route::post('/login','AuthController@login')->name('login');
Route::post('/logout','AuthController@logout')->name('logout');

//productos
Route::get('/store', 'StoreController@index')->name('store.index');

//Admin
Route::get('/admin/dashboard', 'AdminController@desktopView');
Route::get('/admin/dashboard/addProducts', function () {
  return view('admin.addProducts');

  // Add Productos
//Route::post('/addProvedor', [ProveedorController::class, 'store'])->name('proveedor.store');
//add Modelo
//add Provedor
//Route::post('/addProvedor', [ProveedorController::class, 'store'])->name('proveedor.store');



});
Route::get('/barCodeProduct', [AdminController::class, 'getBarcodeExample'])->name('barcode.getBarcodeExample');
Route::post('/admin/addProvedor', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::post('/admin/Model', [ModelProductController::class, 'store'])->name('model.store');



