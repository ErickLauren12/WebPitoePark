<?php

use App\Account;
use App\Cafe;
use App\Facility;
use App\Galery;
use App\Http\Controllers\AccountController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about.index', [
        'title' => 'About'
    ]);
});

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/detail/{news}/edit', [NewsController::class, 'edit']);
    Route::get('/eventlist', [NewsController::class, 'showData']);
    Route::put('/event/edit/{news}', [NewsController::class, 'update']);
    Route::get('/event/create', [NewsController::class, 'createindex']);
    Route::post('/event/create', [NewsController::class, 'post']);
    Route::delete('/event/post/{news}', [NewsController::class, 'destroy']);
    Route::get('/event/search', [NewsController::class, 'search']);

    Route::post('/galery/upload', [GaleryController::class, 'store']);
    Route::delete('/galery/delete/{galery}', [GaleryController::class, 'destroy']);

    Route::get('/cafe/create', [CafeController::class, 'create']);
    Route::post('/cafe/create', [CafeController::class, 'store']);
    Route::delete('/cafe/delete/{cafe}', [CafeController::class, 'destroy']);
    Route::get('/cafe/{cafe}/edit', [CafeController::class, 'edit']);
    Route::put('/cafe/edit/{cafe}', [CafeController::class, 'update']);
    Route::get('/cafe/dashboard', [CafeController::class, 'indexDashBoard']);
    Route::get('/cafe/search', [CafeController::class, 'search']);

    Route::post('/category/create', [CategoryFoodController::class, 'store']);
    Route::delete('/category/delete/{categoryFood}', [CategoryFoodController::class, 'destroy']);

    Route::get('/facility/list', [FacilityController::class, 'list']);
    Route::get('/facility/create', [FacilityController::class, 'create']);
    Route::post('/facility/create', [FacilityController::class, 'store']);
    Route::get('/facilty/{facility}/edit', [FacilityController::class, 'edit']);
    Route::put('/facility/edit/{facility}', [FacilityController::class, 'update']);
    Route::delete('/facility/delete/{facility}', [FacilityController::class, 'destroy']);
    Route::post('/facility_reservation/create', [ReservationFacilityController::class, 'store']);
    Route::delete('/facility_reservation/delete/{reservationFacility}', [ReservationFacilityController::class, 'destroy']);
    Route::get('/facility_reservation', [ReservationFacilityController::class, 'index']);
    Route::get('/facility/search', [FacilityController::class, 'search']);

    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::get('/reservation/create', [ReservationController::class, 'create']);
    Route::post('/reservation/create', [ReservationController::class, 'store']);
});

Route::group(['middleware' => 'is_super_admin'], function () {
    Route::get('/employee', [AccountController::class, 'index']);
    
    Route::post('/register', [AccountController::class, 'store']);
    Route::get('/register', [AccountController::class, 'index']);
    
    Route::get('/galery/dashboard', [GaleryController::class, 'dashboard']);
    Route::get('/galery/confirmation/{galery}', [GaleryController::class, 'confirmation']);
    Route::delete('/galery/delete/{galery}', [GaleryController::class, 'deletedashboard']);
    
    Route::delete('/employee/delete/{account}', [AccountController::class, 'destroy']);

    Route::get('/event/dashboardadmin', [NewsController::class, 'listDataAdmin']);
    Route::get('/event/dashboardadmin/confirmation/{news}', [NewsController::class, 'confirmation']);
    Route::post('/event/dashboardadmin/reject/{news}', [NewsController::class, 'reject']);

    Route::get('/cafe/dashboardadmin', [CafeController::class, 'indexDashBoardAdmin']);
    Route::get('/cafe/dashboardadmin/confirmation/{cafe}', [CafeController::class, 'confirmation']);
    Route::post('/cafe/dashboardadmin/reject/{cafe}', [CafeController::class, 'reject']);

    Route::get('/facility/dashboardadmin', [FacilityController::class, 'indexDashBoardAdmin']);
    Route::get('/facility/dashboardadmin/confirmation/{facility}', [FacilityController::class, 'confirmation']);
    Route::post('/facility/dashboardadmin/reject/{facility}', [FacilityController::class, 'reject']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/event', [NewsController::class, 'listData']);
Route::get('/detail/{cari}', [NewsController::class, 'show']);


Route::get('/galery', [GaleryController::class, 'index']);

Route::get('/location', [Location::class, 'index']);

Route::get('/cafe', [CafeController::class, 'index']);

Route::get('/category', [CategoryFoodController::class, 'index']);

Route::get('/facility', [FacilityController::class, 'index']);
Route::get('/facilty/detail/{cari}', [FacilityController::class, 'detail']);
