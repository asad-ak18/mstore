<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
// home controller
Route::get('home', [HomeController::class, 'index'])->name('home');
// category controller
Route::get('category/index', [CategoryController::class, 'category_home'])->name('category_home');
Route::post('category/post', [CategoryController::class, 'category_post'])->name('category_post');
Route::get('category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category_edit');
Route::post('category/edit/post', [CategoryController::class, 'category_edit_post'])->name('category_edit_post');
Route::get('category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category_delete');
Route::get('category/all/delete', [CategoryController::class, 'category_all_delete'])->name('category_all_delete');
Route::get('category/category_all_restore', [CategoryController::class,'category_all_restore'])->name('category_all_restore');
Route::get('category_restore/{category_id}', [CategoryController::class,'category_restore'])->name('category_restore');
Route::get('categor_forcedelete/{category_id}',[CategoryController::class,'category_forcedelete'])->name('category_forcedelete');
Route::post('checked/delete',[CategoryController::class,'checked_delete'])->name('checked_delete');
// product controller
Route::get('product/index', [ProductController::class, 'product_home'])->name('product_home');
Route::post('product/post', [ProductController::class, 'product_post'])->name('product_post');
Route::get('product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product_delete');
Route::get('product/all_delete', [ProductController::class, 'all_delete'])->name('all_delete');
Route::get('product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product_edit');
Route::get('product/edit/post', [ProductController::class, 'product_edit_post'])->name('product_edit_post');
Route::get('product/restore/{product_id}', [ProductController::class,'product_restore'])->name('product_restore');
Route::get('product/all_restore', [ProductController::class,'product_all_restore'])->name('product_all_restore');
Route::get('product/forcedelete/{product_id}', [ProductController::class,'product_forcedelete'])->name('product_forcedelete');
Route::post('product/check/delete', [ProductController::class,'checkdelete'])->name('checkdelete');


// frontend controller
Route::get('/', [FrontendController::class, 'welcome'])->name('ashion_home');
Route::get('contact', [FrontendController::class,'contact'])->name('contact');
Route::post('contact_post', [FrontendController::class,'contact_post'])->name('contact_post');
Route::get('about', [FrontendController::class,'about'])->name('about');
Route::get('blog', [FrontendController::class,'blog'])->name('blog');
Route::get('blog_detail', [FrontendController::class,'blog_detail'])->name('blog_detail');
Route::get('product', [FrontendController::class,'product'])->name('product');
Route::get('productdetail/{product_id}', [FrontendController::class,'productdetail'])->name('productdetail');
Route::post('productdetail/color/{product_id}',
[FrontendController::class,'productdetail_color_id'])->name('productdetail_color_id');



Route::get('contact_settings', [ContactSettingsController::class,'contact_settings'])->name('contact_settings');
Route::post('contact_settings/post', [ContactSettingsController::class,'contact_settings_post'])->name('contact_settings_post');

