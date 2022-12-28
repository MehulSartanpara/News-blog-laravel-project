<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagesController;

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
Route::get('admin', function () {
    return view('admin/login');
});
Route::post('admin',[AdminController::class, 'login']);

Route::get('admin/index', function () {
    return view('admin/index');
});

Route::get('/admin/logout', function () {
        session()->pull('id');
        session()->pull('username');
        session()->pull('user_img');
        session()->pull('first_name');
        return redirect('admin');
});
Route::get('admin/admins',[AdminController::class, 'index']);
Route::get('admin/add-admin',[AdminController::class, 'create']);
Route::post('admin/add-admin',[AdminController::class, 'store']);
Route::get('admin/update-admin/{id}',[AdminController::class, 'update']);
Route::put('admin/edit-admin/{id}',[AdminController::class, 'edit']);
Route::get('admin/delete-admin/{id}',[AdminController::class, 'destroy']);




// For Catagor

Route::get('admin/category',[CategoryController::class, 'index']);
Route::get('admin/add-category',[CategoryController::class, 'create']);
Route::post('admin/add-category',[CategoryController::class, 'store']);
Route::get('admin/update-category/{cat_id}',[CategoryController::class, 'update']);
Route::put('admin/update-category/{cat_id}',[CategoryController::class, 'edit']);
Route::get('admin/delete-category/{cat_id}',[CategoryController::class, 'destroy']);




// For Post

Route::get('admin/index',[PostController::class, 'index']);
Route::get('admin/add-post',[PostController::class, 'create']);
Route::post('admin/add-post',[PostController::class, 'store']);
Route::get('admin/edit-post/{id}',[PostController::class, 'edit']);
Route::put('admin/update-post/{id}',[PostController::class, 'update']);
Route::get('admin/delete-post/{id}',[PostController::class, 'destroy']);





// For Images

Route::get('admin/images',[ImagesController::class, 'index']);
Route::get('admin/add-images',[ImagesController::class, 'create']);
Route::post('admin/add-images',[ImagesController::class, 'store']);


// For FontEnd Data

Route::get('index',[HomeController::class, 'allData']);
Route::get('single-post/{id}',[HomeController::class, 'SinglePost']);

Route::get('search',[HomeController::class, 'Search']);




















// For FrontEnd

Route::get('/', function () {
    return view('index');
});

