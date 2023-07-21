<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Product_imageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('homeAdmin');

     //Category
     Route::get('/showCate', [CategoryController::class, 'index'])->name('showCate');
     Route::get('/addCate', [CategoryController::class, 'create'])->name('addCate');
     Route::post('/addCategory', [CategoryController::class, 'store'])->name('addCategory');
     Route::get('/editCate/{id}', [CategoryController::class, 'edit'])->name('editCate');
     Route::post('/updateCate/{id}', [CategoryController::class, 'update'])->name('updateCate');
     Route::get('/destroyCate/{id}', [CategoryController::class, 'destroy'])->name('destroyCate');
     Route::get('/activeCategory', [CategoryController::class, 'active'])->name('activeCategory');
 
     //product
     Route::get('/indexProduct', [ProductController::class, 'index'])->name('indexProduct');
     Route::get('/createProduct', [ProductController::class, 'create'])->name('createProduct');
     Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
     Route::get('/editProducts/{id}', [ProductController::class, 'edit'])->name('editProducts');
     Route::post('/updateProducts/{id}', [ProductController::class, 'update'])->name('updateProducts');
     Route::get('/destroyProducts/{id}', [ProductController::class, 'destroy'])->name('destroyProducts');
     Route::get('/active', [ProductController::class, 'active'])->name('active');
     Route::get('/showbyBrand/{id}', [ProductController::class, 'showbyBrand'])->name('showbyBrand');
     Route::get('/showbyCate/{id}', [ProductController::class, 'showbyCate'])->name('showbyCate');
 
     //brands
     Route::get('/showBrand', [BrandController::class, 'index'])->name('showBrand');
     Route::get('/createBrand', [BrandController::class, 'create'])->name('createBrand');
     Route::post('/storeBrand', [BrandController::class, 'store'])->name('storeBrand');
     Route::get('/editBrand/{id}', [BrandController::class, 'edit'])->name('editBrand');
     Route::post('/updateBrand/{id}', [BrandController::class, 'update'])->name('updateBrand');
     Route::get('/destroyBrand/{id}', [BrandController::class, 'destroy'])->name('destroyBrand');
     Route::get('/activeBrand', [BrandController::class, 'active'])->name('activeBrand');
 
     //banners
     Route::get('/indexBanners', [BannerController::class, 'index'])->name('indexBanners');
     Route::get('/createBanners', [BannerController::class, 'create'])->name('createBanners');
     Route::post('/storeBanners', [BannerController::class, 'store'])->name('storeBanners');
     Route::get('/editBanners/{id}', [BannerController::class, 'edit'])->name('editBanners');
     Route::post('/updateBanners/{id}', [BannerController::class, 'update'])->name('updateBanners');
     Route::get('/destroyBanners/{id}', [BannerController::class, 'destroy'])->name('destroyBanners');
     Route::get('/activeBanner', [BannerController::class, 'active'])->name('activeBanner');
 
     //image
     Route::get('/showImage/{id}', [Product_imageController::class, 'show'])->name('showImage');
     Route::get('/createImage/{id}', [Product_imageController::class, 'create'])->name('createImage');
     Route::post('/storeImage', [Product_imageController::class, 'store'])->name('storeImage');
     Route::get('/destroyImage/{id}/{idp}', [Product_imageController::class, 'destroy'])->name('destroyImage');
 
     //order
     Route::get('/indexOrder', [OrderController::class, 'index'])->name('indexOrder');
     Route::get('/showbyId/{id}', [OrderController::class, 'showbyId'])->name('showbyId');
     Route::get('/updateOrder/{id}', [OrderController::class, 'update'])->name('updateOrder');
     Route::get('/exportOrder', [OrderController::class, 'export'])->name('exportOrder');
 
     //user
     Route::get('/indexUser', [UserController::class, 'index'])->name('indexUser');
     Route::get('/createUser', [UserController::class, 'create'])->name('createUser');
     Route::post('/storeUser', [UserController::class, 'store'])->name('storeUser');
     Route::get('/editUser/{id}', [UserController::class, 'edit'])->name('editUser');
     Route::post('/updateUser/{id}', [UserController::class, 'update'])->name('updateUser');
     Route::get('/destroyUser/{id}', [UserController::class, 'destroy'])->name('destroyUser');

    Route::get('/indexReport', [ReportController::class, 'index'])->name('indexReport');
});

Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');