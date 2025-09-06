<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;


// jika user akses root (/), redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'loginStore'])->name('login.store');

// Logout (ingat: form logout harus pakai @csrf)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Semua route yang butuh login
Route::middleware(['auth'])->group(function () {

    // Redirect dashboard sesuai role user
    Route::get('/dashboard', function () {
        $user = Auth::user();
        return match($user->role) {
            'superadmin' => redirect()->route('superadmin.dashboard'),
            'admin'      => redirect()->route('admin.dashboard'),
            default      => redirect()->route('user.dashboard'),
        };
    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | SuperAdmin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
        Route::get('/superadmin/laporan', [SuperAdminController::class, 'laporan'])->name('superadmin.laporan');
        Route::get('/superadmin/team', [SuperAdminController::class, 'team'])->name('superadmin.team');
        Route::get('/superadmin/mapping', [SuperAdminController::class, 'mapping'])->name('superadmin.mapping');
        Route::get('/superadmin/profile', [ProfileController::class, 'index'])->name('superadmin.profile');
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        Route::get('/admin/team', [AdminController::class, 'team'])->name('admin.team');
        Route::get('/admin/mapping', [AdminController::class, 'mapping'])->name('admin.mapping');
        Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    });


    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    });

});