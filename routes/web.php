<?php

use App\Http\Controllers\PostController;
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
//     return view('create');
// });

Route::get('/',[PostController::class,'create'])->name('post#home');
Route::get('customer/createPage',[PostController::class,'create'])->name('post#createPage');

Route::post('post/create',[PostController::class,'postCreate'])->name('post#create');

Route::get('post/delete/{id}',[PostController::class,'postDelete'])->name('post#delete');

Route::get('post/update/{id}',[PostController::class,'postUpdate'])->name('post#update');

Route::get('post/edit/{id}',[PostController::class,'postEdit'])->name('post#edit');

// Route::post('post/updatedata',[PostController::class,'postUpdateData'])->name('post#updatedata');

Route::post('post/updatedata',[PostController::class,'postUpdateData'])->name('post#updatedata');
