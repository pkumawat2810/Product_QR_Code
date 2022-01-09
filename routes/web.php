<?php

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/detail/{id}',[App\Http\Controllers\CustomAuthController::class,'detail']);
Route::get('product',[App\Http\Controllers\ProductController::class,'showProduct']);
Route::post('/addproduct-data',[App\Http\Controllers\ProductController::class,'addproductData'])->name('addproduct-data');

Route::get('allproducts',[App\Http\Controllers\ProductController::class,'product']);
Route::get('/edit/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('edit');
Route::put('/edit/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('update');
Route::get('/delete/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('destroy');

Route::get('/qr-code',[App\Http\Controllers\ProductController::class,'qrcode']);