<?php

use App\Cafe;
use App\Facility;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryFoodController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Location;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationFacilityController;
use App\ReservationFacility;
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
Route::delete('/event/post/{news}',[NewsController::class, 'destroy'])->middleware('is_admin');

Route::get('/galery',[GaleryController::class,'index']);
Route::post('/galery/upload',[GaleryController::class,'store'])->middleware('is_admin');
Route::delete('/galery/delete/{galery}',[GaleryController::class, 'destroy'])->middleware('is_admin');

Route::get('/location',[Location::class, 'index']);

Route::get('/cafe',[CafeController::class,'index']);
Route::get('/cafe/create',[CafeController::class,'create'])->middleware('is_admin');
Route::post('/cafe/create',[CafeController::class,'store'])->middleware('is_admin');
Route::delete('/cafe/delete/{cafe}',[CafeController::class,'destroy'])->middleware('is_admin');
Route::get('/cafe/{cafe}/edit',[CafeController::class,'edit'])->middleware('is_admin');
Route::put('/cafe/edit/{cafe}',[CafeController::class,'update'])->middleware('is_admin');

Route::get('/category',[CategoryFoodController::class,'index']);
Route::post('/category/create',[CategoryFoodController::class,'store'])->middleware('is_admin');
Route::delete('/category/delete/{categoryFood}',[CategoryFoodController::class,'destroy'])->middleware('is_admin');

Route::get('/facility',[FacilityController::class, 'index']);
Route::get('/facility/list',[FacilityController::class, 'list'])->middleware('is_admin');
Route::get('/facility/create',[FacilityController::class, 'create'])->middleware('is_admin');
Route::post('/facility/create',[FacilityController::class, 'store'])->middleware('is_admin');
Route::get('/facilty/detail/{cari}',[FacilityController::class, 'detail']);
Route::get('/facilty/{facility}/edit',[FacilityController::class, 'edit'])->middleware('is_admin');
Route::put('/facility/edit/{facility}',[FacilityController::class, 'update'])->middleware('is_admin');
Route::delete('/facility/delete/{facility}',[FacilityController::class, 'destroy'])->middleware('is_admin');

Route::get('/facility_reservation',[ReservationFacilityController::class, 'index']);
Route::post('/facility_reservation/create',[ReservationFacilityController::class, 'store'])->middleware('is_admin');
Route::delete('/facility_reservation/delete/{reservationFacility}',[ReservationFacilityController::class,'destroy'])->middleware('is_admin');


Route::get('/reservation',[ReservationController::class, 'index']);
Route::get('/reservation/create',[ReservationController::class, 'create']);
Route::post('/reservation/create',[ReservationController::class, 'store']);