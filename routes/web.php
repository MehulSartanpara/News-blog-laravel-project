<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\CommentController;

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


// For Admins
Route::get('admin',[AdminController::class, 'loginreq'])->middleware('AlreadyLoggedIn');
Route::post('admin',[AdminController::class, 'login'])->middleware('AlreadyLoggedIn');
Route::get('/admin/logout',[AdminController::class, 'logout']);


Route::get('admin/admins',[AdminController::class, 'index'])->middleware('isLoggedIn');
Route::get('admin/add-admin',[AdminController::class, 'create'])->middleware('isLoggedIn');
Route::post('admin/add-admin',[AdminController::class, 'store'])->middleware('isLoggedIn');
Route::get('admin/update-admin/{id}',[AdminController::class, 'update'])->middleware('isLoggedIn');
Route::put('admin/edit-admin/{id}',[AdminController::class, 'edit'])->middleware('isLoggedIn');
Route::get('admin/delete-admin/{id}',[AdminController::class, 'destroy'])->middleware('isLoggedIn');




// For Catagor

Route::get('admin/category',[CategoryController::class, 'index'])->middleware('isLoggedIn');
Route::get('admin/add-category',[CategoryController::class, 'create'])->middleware('isLoggedIn');
Route::post('admin/add-category',[CategoryController::class, 'store'])->middleware('isLoggedIn');
Route::get('admin/update-category/{cat_id}',[CategoryController::class, 'update'])->middleware('isLoggedIn');
Route::put('admin/update-category/{cat_id}',[CategoryController::class, 'edit'])->middleware('isLoggedIn');
Route::get('admin/delete-category/{cat_id}',[CategoryController::class, 'destroy'])->middleware('isLoggedIn');




// For Post

Route::get('admin/index',[PostController::class, 'index'])->middleware('isLoggedIn');
Route::get('admin/add-post',[PostController::class, 'create'])->middleware('isLoggedIn');
Route::post('admin/add-post',[PostController::class, 'store'])->middleware('isLoggedIn');
Route::get('admin/edit-post/{id}',[PostController::class, 'edit'])->middleware('isLoggedIn');
Route::put('admin/update-post/{id}',[PostController::class, 'update'])->middleware('isLoggedIn');
Route::get('admin/delete-post/{id}',[PostController::class, 'destroy'])->middleware('isLoggedIn');





// For Images

Route::get('admin/images',[FileUpload::class, 'index'])->middleware('isLoggedIn');
Route::get('admin/add-images', [FileUpload::class, 'createForm'])->middleware('isLoggedIn');
Route::post('admin/add-images', [FileUpload::class, 'fileUpload'])->name('imageUpload');




// For FontEnd Data

Route::get('/',[HomeController::class, 'allData']);
Route::get('single-post/{id}',[HomeController::class, 'SinglePost']);
Route::get('search',[HomeController::class, 'Search']);

Route::post('save-comment',[CommentController::class, 'Store']);