<?php

use App\Cafe;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryFoodController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Location;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
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

Route::get('/',[HomeController::class, 'index']);

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/event',[NewsController::class, 'listData']);
Route::get('/detail/{cari}',[NewsController::class, 'show']);
Route::get('/detail/{news}/edit',[NewsController::class, 'edit'])->middleware('is_admin');
Route::get('/eventlist',[NewsController::class, 'showData'])->middleware('is_admin');
Route::put('/event/edit/{news}',[NewsController::class, 'update'])->middleware('is_admin');

Route::get('/event/create',[NewsController::class, 'createindex'])->middleware('is_admin');
Route::post('/event/create',[NewsController::class, 'post'])->middleware('is_admin');

Route::delete('/event/post/{news}',[NewsController::class, 'destroy']);

Route::get('/galery',[GaleryController::class,'index']);

Route::post('/galery/upload',[GaleryController::class,'store']);
Route::delete('/galery/delete/{galery}',[GaleryController::class, 'destroy']);

Route::get('/location',[Location::class, 'index']);

Route::get('/cafe',[CafeController::class,'index']);
Route::get('/cafe/create',[CafeController::class,'create']);
Route::post('/cafe/create',[CafeController::class,'store']);
Route::delete('/cafe/delete/{cafe}',[CafeController::class,'destroy']);
Route::get('/cafe/{cafe}/edit',[CafeController::class,'edit']);
Route::put('/cafe/edit/{cafe}',[CafeController::class,'update']);
Route::post('/cafe/filter',[CafeController::class,'filter']);

Route::get('/category',[CategoryFoodController::class,'index']);
Route::post('/category/create',[CategoryFoodController::class,'store']);
Route::delete('/category/delete/{categoryFood}',[CategoryFoodController::class,'destroy']);
