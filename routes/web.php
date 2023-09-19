<?php

use App\Http\Controllers\ADDomainController;
use App\Http\Controllers\ADGroupController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ADUserController;
use App\Http\Controllers\CameraController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ContactPersonController;
use App\Http\Controllers\DECTController;
use App\Http\Controllers\DynDNSController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FTPServerController;
use App\Http\Controllers\LicenseWindowsController;
use App\Http\Controllers\LicenseSoftwareController;
use App\Http\Controllers\LoginGeneralController;
use App\Http\Controllers\LoginNASController;
use App\Http\Controllers\OperatingSystemController;
use App\Http\Controllers\VMController;
use App\Http\Controllers\LoginWebsiteController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\NASController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PhoneSystemController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecorderController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\SecurepointUMAController;
use App\Http\Controllers\SecurepointUTMController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\WifiController;

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


// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/operatingsystem', [operatingSystemController::class, 'index'])->name('admin.operatingsystem');
Route::post('/admin/create/operatingsystem', [operatingSystemController::class, 'store']);

Route::get('/admin/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
Route::post('/admin/customer', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('/admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');


// Profile
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


// Customer
Route::get('/customer/search', [CustomerController::class, 'search']);
Route::get('/{customer}', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
Route::post('/{customer}/view-pdf', [CustomerController::class, 'viewPDF'])->name('customer.view-pdf');


Route::middleware(['auth', 'isCustomerRW', 'isCustomerR', 'isCustomer'])->group(function () {

    Route::prefix('{customer}')->group(function () {
        Route::scopeBindings()->group(function () {

            // Site
            Route::post('filter', [SiteController::class, 'filter'])->name('filter.site');
            Route::resource('site', SiteController::class)->except(['show']);
            Route::resource('contactperson', ContactPersonController::class)->except(['show']);

            Route::resource('router', RouterController::class)->except(['show']);
            Route::resource('securepointutm', SecurepointUTMController::class)->except(['show']);
            Route::resource('securepointuma', SecurepointUMAController::class)->except(['show']);
            Route::resource('network', NetworkController::class)->except(['show']);
            Route::resource('server', ServerController::class)->except(['show']);
            Route::resource('vm', VMController::class)->except(['show']);

            // NAS
            //Route::resource('nas', NASController::class)->except(['show']);
            Route::get('nas', [NASController::class, 'index'])->name('nas.index');
            Route::post('nas', [NASController::class, 'store'])->name('nas.store');
            Route::get('nas/create', [NASController::class, 'create'])->name('nas.create');
            Route::get('nas/{nas}/edit', [NASController::class, 'edit'])->name('nas.edit');
            Route::patch('nas/{nas}', [NASController::class, 'update'])->name('nas.update');
            Route::delete('nas/{nas}', [NASController::class, 'destroy'])->name('nas.destroy');



            Route::resource('addomain', ADDomainController::class)->except(['show']);
            Route::resource('aduser', ADUserController::class)->except(['show']);
            Route::resource('adgroup', ADGroupController::class)->except(['show']);
            Route::resource('loginwebsite', LoginWebsiteController::class)->except(['show']);
            Route::resource('logingeneral', LoginGeneralController::class)->except(['show']);

            // LoginNAS
            //Route::resource('loginnas', LoginNASController::class)->except(['show']);
            Route::get('loginnas', [LoginNASController::class, 'index'])->name('loginnas.index');
            Route::post('loginnas', [LoginNASController::class, 'store'])->name('loginnas.store');
            Route::get('loginnas/create', [LoginNASController::class, 'create'])->name('loginnas.create');
            Route::get('loginnas/{loginnas}/edit', [LoginNASController::class, 'edit'])->name('loginnas.edit');
            Route::patch('loginnas/{loginnas}', [LoginNASController::class, 'update'])->name('loginnas.update');
            Route::delete('loginnas/{loginnas}', [LoginNASController::class, 'destroy'])->name('loginnas.destroy');

            Route::resource('phoneSystem', PhoneSystemController::class)->except(['show']);
            Route::resource('phone', PhoneController::class)->except(['show']);
            Route::resource('dect', DECTController::class)->except(['show']);
            Route::resource('mailbox', MailboxController::class)->except(['show']);
            Route::resource('wifi', WifiController::class)->except(['show']);
            Route::resource('computer', ComputerController::class)->except(['show']);
            Route::resource('printer', PrinterController::class)->except(['show']);
            Route::resource('ftpserver', FTPServerController::class)->except(['show']);
            Route::resource('recorder', RecorderController::class)->except(['show']);
            Route::resource('camera', CameraController::class)->except(['show']);

            // Lizenz Software
            //Route::resource('licensesoftware', LicenseSoftwareController::class)->except(['show']);
            Route::get('licensesoftware', [LicenseSoftwareController::class, 'index'])->name('licensesoftware.index');
            Route::post('licensesoftware', [LicenseSoftwareController::class, 'store'])->name('licensesoftware.store');
            Route::get('licensesoftware/create', [LicenseSoftwareController::class, 'create'])->name('licensesoftware.create');
            Route::get('licensesoftware/{licensesoftware}/edit', [LicenseSoftwareController::class, 'edit'])->name('licensesoftware.edit');
            Route::patch('licensesoftware/{licensesoftware}', [LicenseSoftwareController::class, 'update'])->name('licensesoftware.update');
            Route::delete('licensesoftware/{licensesoftware}', [LicenseSoftwareController::class, 'destroy'])->name('licensesoftware.destroy');

            // Lizenz Windows
            //Route::resource('licensewindows', LicenseWindowsController::class)->except(['show']);
            Route::get('licensewindows', [LicenseWindowsController::class, 'index'])->name('licensewindows.index');
            Route::post('licensewindows', [LicenseWindowsController::class, 'store'])->name('licensewindows.store');
            Route::get('licensewindows/create', [LicenseWindowsController::class, 'create'])->name('licensewindows.create');
            Route::get('licensewindows/{licensewindows}/edit', [LicenseWindowsController::class, 'edit'])->name('licensewindows.edit');
            Route::patch('licensewindows/{licensewindows}', [LicenseWindowsController::class, 'update'])->name('licensewindows.update');
            Route::delete('licensewindows/{licensewindows}', [LicenseWindowsController::class, 'destroy'])->name('licensewindows.destroy');

            // DynDNS
            //Route::resource('dyndns', DynDNSController::class)->except(['show']);
            Route::get('dyndns', [DynDNSController::class, 'index'])->name('dyndns.index');
            Route::post('dyndns', [DynDNSController::class, 'store'])->name('dyndns.store');
            Route::get('dyndns/create', [DynDNSController::class, 'create'])->name('dyndns.create');
            Route::get('dyndns/{dyndns}/edit', [DynDNSController::class, 'edit'])->name('dyndns.edit');
            Route::patch('dyndns/{dyndns}', [DynDNSController::class, 'update'])->name('dyndns.update');
            Route::delete('dyndns/{dyndns}', [DynDNSController::class, 'destroy'])->name('dyndns.destroy');


            // File
            Route::resource('file', FileController::class)->only(['index', 'store', 'destroy']);
            Route::get('/file/{file}', [FileController::class, 'download']);

        });

    });

});
