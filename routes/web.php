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

//Route admin
Route::get('/telephone/admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('route_admin_index');
Route::get('/telephone/admin/products', [\App\Http\Controllers\AdminController::class,'products'])->name('route_admin_products');
Route::match(['GET', "POST"],'/telephone/admin/products/add',[\App\Http\Controllers\AdminController::class,'addProducts'])->name('route_admin_addProducts');
Route::match(['GET', 'POST'],'/telephone/admin/products/edit/{id}', [\App\Http\Controllers\AdminController::class,'editProduct'])->name('route_admin_editProduct');
//End admin
