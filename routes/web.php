<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Encoder\EncoderDashboardController;
use App\Http\Controllers\UnauthorizedAccessController;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\admin\InventoryController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\UnitController;
use App\Http\Middleware\Admin\AdminRole;
use App\Http\Middleware\Encoder\EncoderRole;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['register' => true]); 

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/Unauthorized', [UnauthorizedAccessController::class, 'unauthorized'])
    ->name('Unauthorized-access');

Route::middleware(['auth', AdminRole::class])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');
        Route::get('/accounts', [AccountsController::class, 'accounts'])
            ->name('accounts.list');
        Route::get('/accounts/details/{acc}',[AccountsController::class, 'accountsDetails'])
            ->name('accounts.details');
        Route::put('accounts/details/change-pw/{acc}', [AccountsController::class, 'accountsChangePw'])
            ->name('accounts.change.pw');
        Route::post('/accounts/registration', [AccountsController::class, 'adminRegister'])
            ->name('accounts.register');
        Route::get('/role', [RoleController::class, 'roleIndex'])
            ->name('role.list');
        Route::post('/role/create', [RoleController::class, 'addRole'])
            ->name('role.add');
        Route::get('/category', [CategoryController::class, 'index'])
            ->name('category');
        Route::post('/category/add',[CategoryController::class, 'addCategory'])
            ->name('add.category');
        Route::get('/equipment',[EquipmentController::class, 'equipment'])
            ->name('equipment');
        Route::post('/equipment/add',[EquipmentController::class, 'addEquipment'])
            ->name('add.equipment');
        Route::get('/department', [DepartmentController::class, 'index'])
            ->name('department');
        Route::post('/department/add', [DepartmentController::class, 'addDepartment'])
            ->name('add.department');
        Route::get('/inventory',[InventoryController::class, 'index'])
            ->name('inventory');
        Route::get('/unit', [UnitController::class, 'index'])
            ->name('unit');
        Route::post('/unit/add', [UnitController::class, 'addUnit'])
            ->name('add.unit');
    });
});

Route::middleware(['auth', EncoderRole::class])->group(function () {
    Route::prefix('encoder')->name('encoder.')->group(function (){
        Route::get('/dashboard', [EncoderDashboardController::class, 'index'])
            ->name('dashboard');
    });
});