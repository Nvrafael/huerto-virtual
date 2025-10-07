<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\PlantController;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
    // Perfil de usuario
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/profile/password', [UserController::class, 'editPassword'])->name('profile.password');
    Route::put('/profile/password', [UserController::class, 'updatePassword'])->name('profile.password.update');
    
    // Ranking
    Route::get('/ranking', [UserController::class, 'ranking'])->name('ranking');
});

// Rutas de administración
Route::middleware(['auth', 'role:administrador'])->prefix('admin')->name('admin.')->group(function () {
    // Gestión de usuarios
    Route::resource('users', UserManagementController::class);
    Route::post('users/{user}/reset-points', [UserManagementController::class, 'resetPoints'])->name('users.reset-points');
    Route::post('users/{user}/add-points', [UserManagementController::class, 'addPoints'])->name('users.add-points');

    // Catálogo de plantas
    Route::resource('plants', PlantController::class);
});
