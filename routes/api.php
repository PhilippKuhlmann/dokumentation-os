<?php

use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\RackCabinetController;
use App\Http\Controllers\API\RackDeviceController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\SiteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [RackCabinetController::class, 'deletePosition']);


Route::middleware(['auth:sanctum'])->group(function () {

    // Customer
    Route::get('/customers', [CustomerController::class, 'getAllCustomers']);
    Route::post('/customers', [CustomerController::class, 'store']);

    // Site
    Route::get('/sites', [SiteController::class, 'customerSites']);
    Route::post('/sites', [SiteController::class, 'store']);

    // Rooms
    Route::get('/rooms', [RoomController::class, 'customerRooms']);
    Route::post('/rooms', [RoomController::class, 'store']);
    Route::get('/room/{room}', [RoomController::class, 'show']);

    // RackCabinets
    Route::get('/rackcabinets', [RackCabinetController::class, 'customerRackCabinets']);
    Route::post('/rackcabinets', [RackCabinetController::class, 'store']);
    Route::get('/rackcabinets/devices', [RackCabinetController::class, 'getRackCabinetDevices']);

    Route::get('/rackcabinets/update', [RackCabinetController::class, 'update']);
    Route::get('/rackcabinets/addposition', [RackCabinetController::class, 'addPosition']);
    Route::get('/rackcabinets/deleteposition', [RackCabinetController::class, 'deletePosition']);

    // RackDevices
    Route::get('/rackdevices', [RackDeviceController::class, 'getAll']);


});
