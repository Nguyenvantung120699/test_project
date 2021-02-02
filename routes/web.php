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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);


Route::get('product-index', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('product-show-{id}', [App\Http\Controllers\ProductController::class, 'show']);
Route::get('product-create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('product-create-store', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('product-edit-{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('product-update/{id}', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('product-destroy-{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::get('category-index', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('category-show-{id}', [App\Http\Controllers\CategoryController::class, 'show']);
Route::get('category-edit-{id}', [App\Http\Controllers\CategoryController::class, 'edit']);
Route::post('category-update/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
Route::get('category-create', [App\Http\Controllers\CategoryController::class, 'create']);
Route::post('category-create-store', [App\Http\Controllers\CategoryController::class, 'store']);
Route::get('category-destroy-{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);

