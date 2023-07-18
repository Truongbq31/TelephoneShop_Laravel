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
Route::get('/telephone/admin', [\App\Http\Controllers\ProductsController::class, 'index'])->name('route_admin_index');
//Product
Route::get('/telephone/admin/products', [\App\Http\Controllers\ProductsController::class,'products'])->name('route_admin_products');
Route::match(['GET', "POST"],'/telephone/admin/products/add',[\App\Http\Controllers\ProductsController::class,'addProducts'])->name('route_admin_addProducts');
Route::match(['GET', 'POST'],'/telephone/admin/products/edit/{id}', [\App\Http\Controllers\ProductsController::class,'editProduct'])->name('route_admin_editProduct');

//Categories
Route::get('/telephone/admin/categories', [\App\Http\Controllers\CategoriesController::class,'categories'])->name('route_admin_categories');
Route::match(['GET','POST'], '/telephone/admin/categories/add',[\App\Http\Controllers\CategoriesController::class,'addCategories'])->name('route_admin_addCategories');
Route::match(['GET','POST'],'/telephone/admin/categories/edit/{id}',[\App\Http\Controllers\CategoriesController::class,'editCategories'])->name('route_admin_editCategories');
//End admin
