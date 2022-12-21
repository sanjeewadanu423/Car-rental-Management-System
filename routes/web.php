<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CregisterController;
use App\Http\Controllers\NotificationControler;
use App\Http\Controllers\AvailabilityController;

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
//     return view('index');
// });


Auth::routes();
Route::get('/', [FrontController::class, 'land'])->name("index");
// Route::get('index', [FrontController::class, 'reland'])->name("index");


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/driver', [App\Http\Controllers\HomeController::class, 'Driverindex']);

// Route::get('changeStatus', VehicleController::class, 'changeStatus');
Route::get('changeStatus', 'VehicleController@changeStatus')->name('changeStatus');

//Availability check routes
Route::post('/check', [AvailabilityController::class, 'vehicle'])->name("Check");


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
    Route::resource('bookings', BookingController::class , ['names' => ['index' => 'bookings']]);
});

// vehicle states
Route::get('/statesYes{vid}', [VehicleController::class, 'statusYes'])->name('statusYes');
Route::get('/statesNo{vid}', [VehicleController::class, 'statesNo'])->name('statesNo');

// driver states
Route::get('/DriverstatesYes{did}', [DriverController::class, 'statusYes'])->name('statusYes');
Route::get('/DriverstatesNo{did}', [DriverController::class, 'statesNo'])->name('statesNo');

// bookin complete
Route::get('/bCompleteYes{bid}', [BookingController::class, 'isReturnYes'])->name('isReturnYes');
Route::get('/bCompleteNo{bid}', [BookingController::class, 'isReturnNo'])->name('isReturnNo');

// booking path through vehicle
Route::post('regi', [CregisterController::class, 'store'])->name('regi');
Route::post('cars', [FrontController::class, 'index'])->name("cars");
Route::post('cabs', [FrontController::class, 'index1'])->name("cabs");
Route::post('vans', [FrontController::class, 'index2'])->name("vans");
Route::get('prof/{vid}', [FrontController::class, 'vehi_prof'])->name("prof");
Route::get('driver_prof/{did}/{vid}', [FrontController::class, 'driv_prof'])->name("driver_prof");

// notice
Route::get('notifi', [NotificationControler::class, 'notification'])->name("notifi");

// Admin panel profiles
Route::get('driver_profile/{driverid}', [DriverController::class, 'showProfile'])->name("driver_profile");
Route::get('customer_profile/{customerid}', [CustomerController::class, 'showProfile'])->name("customer_profile");
Route::get('vehicle_profile/{vehicleid}', [VehicleController::class, 'vehicleProfile'])->name("vehicle_profile");

// Route::post('/drivers/store', [App\Http\Controllers\DriverController::class, 'store'])->name('driver.store');
