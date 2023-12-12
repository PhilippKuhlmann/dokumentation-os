<?php

use App\Http\Controllers\Api\AccesspointController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\RackCabinetController;
use App\Http\Controllers\API\RackDeviceController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\Api\ServerController;
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

    Route::get('/customers', [CustomerController::class, 'index']);
    Route::get('/{customer}', [CustomerController::class, 'show']);
    Route::post('/customers', [CustomerController::class, 'store']);


    Route::prefix('{customer}')->group(function () {

        Route::get('/accesspoints', [AccesspointController::class, 'index']);
        Route::get('/{site}/{room}/accesspoints/{accesspoint}', [AccesspointController::class, 'show']);
        Route::post('/{site}/{room}/accesspoints', [AccesspointController::class, 'store']);
        Route::put('/{site}/{room}/accesspoints/{accesspoint}', [AccesspointController::class, 'update']);
        Route::delete('/{site}/{room}/accesspoints/{accesspoint}', [AccesspointController::class, 'delete']);

        Route::get('/sites', [SiteController::class, 'index']);
        Route::post('/sites', [SiteController::class, 'store']);
    });


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





    // Server
    Route::get('servers', [ServerController::class, 'index']);
    Route::get('servers/{server}', [ServerController::class, 'show']);
    Route::post('servers', [ServerController::class, 'store']);
    Route::put('servers/{server}', [ServerController::class, 'update']);
    Route::delete('servers/{server}', [ServerController::class, 'delete']);







});
