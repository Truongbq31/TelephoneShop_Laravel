<?php

use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsAttributesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\CommentsController;
use App\Http\Controllers\Client\IndexController;
use App\Http\Controllers\Client\LoginController;
use App\Http\Controllers\Client\ProductsController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', [IndexController::class, 'index'])
    ->name('home');

//Login
Route::match(['GET', 'POST'], '/telephone/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login'])->name('route_admin_login');
Route::get('telephone/admin/logout', [\App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('route_admin_logout');
Route::match(['GET', 'POST'], '/telephone/admin/register', [\App\Http\Controllers\Admin\LoginController::class, 'register'])->name('route_admin_register');

Route::middleware(['auth', 'check.login'])->group(function () {
    //Route admin
    Route::get('/telephone/admin', [HomeController::class, 'index'])->name('route_admin_index');
    //Products
    Route::get('/telephone/admin/products', [\App\Http\Controllers\Admin\ProductsController::class, 'products'])->name('route_admin_products');
    Route::match(['GET', "POST"], '/telephone/admin/products/add', [\App\Http\Controllers\Admin\ProductsController::class, 'addProducts'])->name('route_admin_addProducts');
    Route::match(['GET', "POST"], '/telephone/admin/products/edit/{id}', [\App\Http\Controllers\Admin\ProductsController::class, 'editProducts'])->name('route_admin_editProducts');
    Route::get('/telephone/admin/products/delete/{id}', [\App\Http\Controllers\Admin\ProductsController::class, 'deleteProducts'])->name('route_admin_deleteProducts');
    //Categories
    Route::get('/telephone/admin/categories', [CategoriesController::class, 'index'])->name('route_admin_categories');
    Route::match(['GET', "POST"], '/telephone/admin/categories/add', [CategoriesController::class, 'addCategories'])->name('route_admin_addCategories');
    Route::match(['GET', "POST"], '/telephone/admin/categories/edit/{id}', [CategoriesController::class, 'editCategories'])->name('route_admin_editCategories');
    Route::get('/telephone/admin/categories/delete/{id}', [CategoriesController::class, "deleteCategories"])->name('route_admin_deleteCategories');
    //Banners
    Route::get('/telephone/admin/banners', [BannersController::class, 'banners'])->name('route_admin_banners');
    Route::match(['GET', 'POST'], '/telephone/admin/banners/add', [BannersController::class, 'addBanners'])->name('route_admin_addBanners');
    Route::match(['GET', 'POST'], '/telephone/admin/banners/edit/{id}', [BannersController::class, 'editBanners'])->name('route_admin_editBanners');
    Route::get('/telephone/admin/banners/delete/{id}', [BannersController::class, 'deleteBanners'])->name('route_admin_deleteBanners');
    //Attributes
    Route::get('/telephone/admin/attributes', [AttributesController::class, 'attributes'])->name('route_admin_attributes');
    Route::get('/telephone/admin/attributes/delete/{id}', [AttributesController::class, 'deleteAttributes'])->name('route_admin_deleteAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/attributes/add', [AttributesController::class, 'addAttributes'])->name('route_admin_addAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/attributes/edit/{id}', [AttributesController::class, 'editAttributes'])->name('route_admin_editAttributes');
    //ProductsAttributes
    Route::get('/telephone/admin/productsAttributes', [ProductsAttributesController::class, 'productsAttributes'])->name('route_admin_productsAttributes');
    Route::get('/telephone/admin/productsAttributes/delete/{id}', [ProductsAttributesController::class, 'deleteProductsAttributes'])->name('route_admin_deleteProductsAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/productsAttributes/add', [ProductsAttributesController::class, 'addProductsAttributes'])->name('route_admin_addProductsAttributes');
    Route::match(['GET', 'POST'], '/telephone/admin/productsAttributes/edit/{products_id}-{attributes_id}', [ProductsAttributesController::class, 'editProductsAttributes'])->name('route_admin_editProductsAttributes');
    //Users
    Route::get('/telephone/admin/users', [UsersController::class, 'index'])->name('route_admin_users');
    Route::get('/telephone/admin/updateStatus/{id}', [UsersController::class, 'updateStatus'])->name('route_admin_updateStatus');
    Route::match(['GET', 'POST'], 'telephone/admin/editUsers/{id}', [UsersController::class, 'editUsers'])->name('route_admin_editUsers');


//End admin
});

Route::post('checkout',[PaymentController::class,'payment'])
    ->name('payment');

Route::get('order-success',[PaymentController::class,'handlePayment'])
    ->name('client.handlePayment');

//Login client
Route::match(['GET', 'POST'], '/telephone/index/login', [LoginController::class, 'login'])->name('route_client_login');
Route::get('telephone/index/logout', [LoginController::class, 'logout'])->name('route_client_logout');
Route::match(['GET', 'POST'], 'telephone/index/register', [LoginController::class, 'register'])->name('route_client_register');

//Route Client
Route::get('/telephone/index', [IndexController::class, 'index'])->name('route_client_index');
Route::get('/telephone/products', [ProductsController::class, 'products'])->name('route_client_products');
Route::get('/telephone/products/detail/{id}', [ProductsController::class, 'productsDetail'])->name('route_client_productsDetail');
Route::get('/telephone/products/{name}', [ProductsController::class, 'productsByCategoriesName'])->name('route_client_prdByCategoriesName');
Route::get('/telephone/profile', [UserController::class, 'profile'])->name('route_client_profile');
Route::match(['GET', 'POST'], 'telephone/profile/update/{id}', [UserController::class, 'updateProfile'])->name('route_client_updateProfile');
Route::match(['GET', 'POST'], 'telephone/profile/changePassword/{id}', [UserController::class, 'changePassword'])->name('route_client_changePassword');

//Cart
Route::prefix('cart')->group(function () {
    Route::get('add/{id}', [CartController::class, 'add'])->name('route_cart_add');
    Route::get('/', [CartController::class, 'index'])->name('route_cart_index');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('route_cart_delete');
    Route::get('/update', [CartController::class, 'update'])->name('route_cart_update');
});

//End client

//Comment
Route::post('/telephone/comment', [CommentsController::class, 'comment'])->name('route_client_comments');
//Check out
Route::post('/telephone/checkout', [CheckoutController::class, 'checkOut'])->name('route_checkout');
