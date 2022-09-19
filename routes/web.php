<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
Use App\Http\Controllers\ProfileController;
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

Route::get('customhelper', [HomeController::class, 'customhelper']);
Route::get('helper', [HomeController::class, 'helper']);
Route::get('httpclient', [HomeController::class, 'http_client']);
Route::post('httpregister', [HomeController::class, 'httpregister']);

Route::resource('profile', ProfileController::class);

Route::get('product',[ProductController::class, 'index'])->name('product');
Route::post('productsave',[ProductController::class, 'store'])->name('productsave');
Route::put('update/{product}',[ProductController::class, 'update'])->name('update');
Route::post('delete/{product}',[ProductController::class, 'destroy'])->name('delete');
Route::get('product/pagination/paginate-data',[ProductController::class, 'paginate']);
Route::get('product/search',[ProductController::class, 'search']);