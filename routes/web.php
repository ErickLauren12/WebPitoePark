<?php

use App\Account;
use App\Cafe;
use App\CategoryReservation;
use App\Facility;
use App\Galery;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\CategoryFoodController;
use App\Http\Controllers\CategoryReservationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Location;
use App\Http\Controllers\LogCafeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogFacilityController;
use App\Http\Controllers\LogGalerieController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationFacilityController;
use App\LogNews;
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
    Route::get('/detail_dashboard/{cari}', [NewsController::class, 'showDashboard']);
    Route::get('event/extract/{number}',[NewsController::class, 'extractData']);
    Route::get('event/extract',[NewsController::class, 'exportData']);

    Route::get('/galery/dashboard_pegawai', [GaleryController::class, 'dashboardPegawai']);
    Route::post('/galery/upload', [GaleryController::class, 'store']);
    Route::delete('/galery/delete/{galery}', [GaleryController::class, 'destroy']);

    Route::get('/cafe/create', [CafeController::class, 'create']);
    Route::post('/cafe/create', [CafeController::class, 'store']);
    Route::delete('/cafe/delete/{cafe}', [CafeController::class, 'destroy']);
    Route::get('/cafe/{cafe}/edit', [CafeController::class, 'edit']);
    Route::put('/cafe/edit/{cafe}', [CafeController::class, 'update']);
    Route::get('/cafe/dashboard', [CafeController::class, 'indexDashBoard']);
    Route::get('/cafe/dashboard/process', [CafeController::class, 'indexProcessOrder'])->name('order.pesanan.process');
    Route::get('/cafe/dashboard/done', [CafeController::class, 'indexDoneOrder'])->name('order.pesanan.selesai');
    Route::get('/cafe/order/pesanan', [CafeController::class, 'order'])->name('order.pesanan.cafe');
    Route::get('/cafe/order/done/{id}', [CafeController::class, 'done'])->name('order.done.cafe');

    Route::post('/cafe/order/pesanan', [CafeController::class, 'processOrder'])->name('order.pesanan.processOrder');
    Route::get('/cafe/order/pesanan/getdata', [CafeController::class, 'getData'])->name('order.pesanan.cafe.getdata');
    Route::get('/cafe/search', [CafeController::class, 'search']);
    Route::get('cafe/extract/{number}',[CafeController::class, 'extractData']);
    Route::get('cafe/extract',[CafeController::class, 'exportData']);

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
    Route::get('/facility_detail_dashboard/{cari}', [FacilityController::class, 'showDashboard']);
    Route::get('facility/extract/{number}',[FacilityController::class, 'extractData']);
    Route::get('facility/extract',[FacilityController::class, 'exportData']);

    Route::get('/qrcode', 'MejaController@index')->name('meja.index');
            Route::post('/qrcode', 'MejaController@store')->name('meja.store');
            Route::get('qrcode/{id}', 'MejaController@generate')->name('meja.generate');

    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::delete('/reservation/delete/{reservation}', [ReservationController::class, 'destroy']);
    Route::get('/reservation/statistics', [ReservationController::class, 'statistics']);
    Route::post('/reservation/statistics/search', [ReservationController::class, 'search']);
    Route::get('/reservation/create', [ReservationController::class, 'create']);
    Route::post('/reservation/create', [ReservationController::class, 'store']);
    Route::get('/reservation/category', [CategoryReservationController::class, 'index']);
    Route::post('/reservation/category/create', [CategoryReservationController::class, 'store']);
    Route::get('reservation/extract/{number}',[ReservationController::class, 'extractData']);
    Route::get('reservation/extract',[ReservationController::class, 'exportData']);

    Route::get('/employee/edit', [AccountController::class, 'indexEmployee']);
    Route::post('/employee/editStore', [AccountController::class, 'updatePassword']);

    Route::get('/dashboardPegawai',[AccountController::class, 'indexDashboard']);
});

Route::group(['middleware' => 'is_super_admin'], function () {
    Route::get('/employee', [AccountController::class, 'index']);
    
    Route::post('/register', [AccountController::class, 'store']);
    Route::get('/register', [AccountController::class, 'index']);
    
    Route::get('/galery/dashboard', [GaleryController::class, 'dashboard']);
    Route::get('/galery/confirmation/{galery}', [GaleryController::class, 'confirmation']);
    
    Route::delete('/employee/delete/{account}', [AccountController::class, 'destroy']);
    Route::get('/employee/search', [AccountController::class, 'search']);

    Route::get('/event/dashboardadmin', [NewsController::class, 'listDataAdmin']);
    Route::get('/event/dashboardadmin/confirmation/{news}', [NewsController::class, 'confirmation']);
    Route::post('/event/dashboardadmin/reject/{news}', [NewsController::class, 'reject']);

    Route::get('/cafe/dashboardadmin', [CafeController::class, 'indexDashBoardAdmin']);
    Route::get('/cafe/dashboardadmin/confirmation/{cafe}', [CafeController::class, 'confirmation']);
    Route::post('/cafe/dashboardadmin/reject/{cafe}', [CafeController::class, 'reject']);

    Route::get('/facility/dashboardadmin', [FacilityController::class, 'indexDashBoardAdmin']);
    Route::get('/facility/dashboardadmin/confirmation/{facility}', [FacilityController::class, 'confirmation']);
    Route::post('/facility/dashboardadmin/reject/{facility}', [FacilityController::class, 'reject']);

    Route::get('/log/event', [LogNewsController::class, 'index']);
    Route::post('/log/event/search', [LogNewsController::class, 'find']);

    Route::get('/log/cafe', [LogCafeController::class, 'index']);
    Route::post('/log/cafe/search', [LogCafeController::class, 'find']);

    Route::get('/log/galery', [LogGalerieController::class, 'index']);
    Route::post('/log/galery/search', [LogGalerieController::class, 'find']);

    Route::get('/log/facility', [LogFacilityController::class, 'index']);
    Route::post('/log/facility/search', [LogFacilityController::class, 'find']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/event', [NewsController::class, 'listData']);
Route::get('/detail/{cari}', [NewsController::class, 'show']);


Route::get('/galery', [GaleryController::class, 'index']);

Route::get('/location', [Location::class, 'index']);

Route::get('/cafe', [CafeController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/{id}', [OrderController::class, 'detail'])->name('order.detail');
Route::post('/order/{id}', [OrderController::class, 'store'])->name('order.store');
Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('order.delete.cafe');

Route::post('/process', [OrderController::class, 'process'])->name('order.process');

Route::get('/category', [CategoryFoodController::class, 'index']);

Route::get('/facility', [FacilityController::class, 'index']);
Route::get('/facilty/detail/{cari}', [FacilityController::class, 'detail']);
