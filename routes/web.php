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
Route::get('/telephone/admin', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('route_admin_index');
//Products
Route::get('/telephone/admin/products', [\App\Http\Controllers\Admin\ProductsController::class,'products'])->name('route_admin_products');
Route::match(['GET', "POST"],'/telephone/admin/products/add',[\App\Http\Controllers\Admin\ProductsController::class,'addProducts'])->name('route_admin_addProducts');
Route::match(['GET', "POST"],'/telephone/admin/products/edit/{id}',[\App\Http\Controllers\Admin\ProductsController::class,'editProducts'])->name('route_admin_editProducts');
Route::get('/telephone/admin/products/delete/{id}', [\App\Http\Controllers\Admin\ProductsController::class, 'deleteProducts'])->name('route_admin_deleteProducts');
//Categories
Route::get('/telephone/admin/categories', [\App\Http\Controllers\Admin\CategoriesController::class,'index'])->name('route_admin_categories');
Route::match(['GET', "POST"],'/telephone/admin/categories/add',[\App\Http\Controllers\Admin\CategoriesController::class, 'addCategories'])->name('route_admin_addCategories');
Route::match(['GET', "POST"],'/telephone/admin/categories/edit/{id}',[\App\Http\Controllers\Admin\CategoriesController::class, 'editCategories'])->name('route_admin_editCategories');
Route::get('/telephone/admin/categories/delete/{id}', [\App\Http\Controllers\Admin\CategoriesController::class,"deleteCategories"])->name('route_admin_deleteCategories');
//Banners
Route::get('/telephone/admin/banners', [\App\Http\Controllers\Admin\BannersController::class,'Banners'])->name('route_admin_banners');
Route::match(['GET','POST'],'/telephone/admin/banners/add', [\App\Http\Controllers\Admin\BannersController::class,'addBanners'])->name('route_admin_addBanners');
Route::match(['GET','POST'],'/telephone/admin/banners/edit/{id}', [\App\Http\Controllers\Admin\BannersController::class,'editBanners'])->name('route_admin_editBanners');
Route::get('/telephone/admin/banners/delete/{id}', [\App\Http\Controllers\Admin\BannersController::class,'deleteBanners'])->name('route_admin_deleteBanners');
//End admin
