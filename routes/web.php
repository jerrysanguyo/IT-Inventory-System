<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\roleController;
use App\Http\Controllers\admin\adminDashboardController;
use App\Http\Controllers\encoder\encoderDashboardController;
use App\Http\Controllers\unauthorizedAccessController;
use App\Http\Controllers\admin\AccountsController;
use App\Http\Middleware\admin\adminRole;
use App\Http\Middleware\encoder\encoderRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth', adminRole::class])->group(function () {
    Route::get('/dashboard-admin', [adminDashboardController::class, 'index'])->name('dashboard-admin');
    Route::get('/accounts', [AccountsController::class, 'accounts'])->name('account-list');
    Route::post('/accounts/registration', [AccountsController::class, 'adminRegister'])->name('admin-register');
    Route::get('/role', [roleController::class, 'roleIndex'])->name('role-list');
    Route::post('role/create', [roleController:: class, 'addRole'])->name('role-add');
});

Route::middleware(['auth', encoderRole::class])->group(function () {
    Route::get('/dashboard-encoder', [encoderDashboardController::class, 'index'])->name('dashboard-encoder');
});

Route::get('/Unauthorized', [UnauthorizedAccessController::class, 'unauthorized'])->name('Unauthorized-access');
Route::get('/register', function () { return view('auth.register');})->name('register');