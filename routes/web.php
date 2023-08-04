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

//Login
Route::match(['GET','POST'],'/telephone/admin/login', [\App\Http\Controllers\Admin\LoginController::class,'login'])->name('route_admin_login');
Route::get('telephone/admin/logout', [\App\Http\Controllers\Admin\LoginController::class,'logout'])->name('route_admin_logout');
Route::match(['GET', 'POST'], '/telephone/admin/register', [\App\Http\Controllers\Admin\LoginController::class,'register'])->name('route_admin_register');

Route::middleware(['auth', 'check.login'])->group(function (){
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
    Route::get('/telephone/admin/banners', [\App\Http\Controllers\Admin\BannersController::class,'banners'])->name('route_admin_banners');
    Route::match(['GET','POST'],'/telephone/admin/banners/add', [\App\Http\Controllers\Admin\BannersController::class,'addBanners'])->name('route_admin_addBanners');
    Route::match(['GET','POST'],'/telephone/admin/banners/edit/{id}', [\App\Http\Controllers\Admin\BannersController::class,'editBanners'])->name('route_admin_editBanners');
    Route::get('/telephone/admin/banners/delete/{id}', [\App\Http\Controllers\Admin\BannersController::class,'deleteBanners'])->name('route_admin_deleteBanners');
    //Attributes
    Route::get('/telephone/admin/attributes', [\App\Http\Controllers\Admin\AttributesController::class,'attributes'])->name('route_admin_attributes');
    Route::get('/telephone/admin/attributes/delete/{id}', [\App\Http\Controllers\Admin\AttributesController::class,'deleteAttributes'])->name('route_admin_deleteAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/attributes/add', [\App\Http\Controllers\Admin\AttributesController::class,'addAttributes'])->name('route_admin_addAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/attributes/edit/{id}', [\App\Http\Controllers\Admin\AttributesController::class,'editAttributes'])->name('route_admin_editAttributes');
    //ProductsAttributes
    Route::get('/telephone/admin/productsAttributes',[\App\Http\Controllers\Admin\ProductsAttributesController::class,'productsAttributes'])->name('route_admin_productsAttributes');
    Route::get('/telephone/admin/productsAttributes/delete/{id}',[\App\Http\Controllers\Admin\ProductsAttributesController::class,'deleteProductsAttributes'])->name('route_admin_deleteProductsAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/productsAttributes/add', [\App\Http\Controllers\Admin\ProductsAttributesController::class,'addProductsAttributes'])->name('route_admin_addProductsAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/productsAttributes/edit/{products_id}-{attributes_id}', [\App\Http\Controllers\Admin\ProductsAttributesController::class,'editProductsAttributes'])->name('route_admin_editProductsAttributes');
    //Users
    Route::get('/telephone/admin/users', [\App\Http\Controllers\Admin\UsersController::class,'index'])->name('route_admin_users');
    Route::get('/telephone/admin/updateStatus/{id}', [\App\Http\Controllers\Admin\UsersController::class,'updateStatus'])->name('route_admin_updateStatus');
    Route::match(['GET','POST'], 'telephone/admin/editUsers/{id}', [\App\Http\Controllers\Admin\UsersController::class,'editUsers'])->name('route_admin_editUsers');


//End admin
});


//Route Client
Route::get('/telephone/index', [\App\Http\Controllers\Client\IndexController::class,'index'])->name('route_client_index');
Route::get('/telephone/products', [\App\Http\Controllers\Client\ProductsController::class,'products'])->name('route_client_products');
Route::get('/telephone/products/detail/{id}', [\App\Http\Controllers\Client\ProductsController::class,'productsDetail'])->name('route_client_productsDetail');
Route::get('/telephone/products/{name}', [\App\Http\Controllers\Client\ProductsController::class,'productsByCategoriesName'])->name('route_client_prdByCategoriesName');
//cart
Route::prefix('cart')->group(function (){
    Route::get('add/{id}',[\App\Http\Controllers\Client\CartController::class,'add'])->name('route_cart_add');
    Route::get('/',[\App\Http\Controllers\Client\CartController::class,'index'])->name('route_cart_index');
    Route::get('delete/{id}',[\App\Http\Controllers\Client\CartController::class,'delete'])->name('route_cart_delete');
    Route::get('/update',[\App\Http\Controllers\Client\CartController::class,'update'])->name('route_cart_update');
});
//End client


