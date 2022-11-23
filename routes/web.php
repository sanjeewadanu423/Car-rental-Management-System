<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/driver', [App\Http\Controllers\HomeController::class, 'Driverindex']);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class , ['names' => ['index' => 'roles','create' => 'roles.create']]);
    Route::resource('users', UserController::class , ['names' => ['index' => 'users']]);

    Route::resource('drivers', DriverController::class , ['names' => ['index' => 'drivers']]);
    Route::resource('customers', CustomerController::class , ['names' => ['index' => 'customers']]);
    Route::resource('reviews', ReviewController::class , ['names' => ['index' => 'reviews']]);
    Route::resource('categorys', CategoryController::class , ['names' => ['index' => 'categorys','create' => 'categorys.create']]);
    Route::resource('types', TypeController::class , ['names' => ['index' => 'types']]);
    Route::resource('offers', OfferController::class , ['names' => ['index' => 'offers']]);
    Route::resource('vehicles', VehicleController::class , ['names' => ['index' => 'vehicles']]);
});

// Route::post('/drivers/store', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.store');
