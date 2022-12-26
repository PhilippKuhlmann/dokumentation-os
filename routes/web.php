<?php

use App\Http\Controllers\ADGroupController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ADUserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ServerOperatingSystemController;
use App\Http\Controllers\VMController;
use App\Http\Controllers\LoginWebsiteController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhoneSystemController;

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
require __DIR__.'/auth.php';



Route::get('/', function() {
    return redirect('/login');
});

Route::get('/test', function() {
    return view('lab.test');
});

// Admin
Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/serveroperatingsystem', [ServerOperatingSystemController::class, 'index']);
Route::post('/admin/create/serveroperatingsystem', [ServerOperatingSystemController::class, 'store']);

// Customer
Route::get('/customer/search', [CustomerController::class, 'search']);
Route::get('/{customer}', [CustomerController::class, 'index'])->name('customer.dashboard');


Route::middleware(['auth', 'isCustomer'])->group(function () {

    Route::prefix('{customer}')->group(function () {
        Route::scopeBindings()->group(function () {

            Route::resource('network', NetworkController::class);
            Route::resource('server', ServerController::class)->except(['show']);
            Route::resource('vm', VMController::class)->except(['show']);
            Route::resource('aduser', ADUserController::class)->except(['show']);
            Route::resource('adgroup', ADGroupController::class)->except(['show']);
            Route::resource('loginwebsite', LoginWebsiteController::class)->except(['show']);
            Route::resource('phoneSystem', PhoneSystemController::class)->except(['show']);
            Route::resource('phone', PhoneController::class)->except(['show']);
            Route::resource('mailbox', MailboxController::class)->except(['show']);

            // File
            Route::resource('file', FileController::class)->only(['index', 'store', 'destroy']);
            Route::get('/file/{file}', [FileController::class, 'download']);

        });

    });

});
