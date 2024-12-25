<?php

use App\Models\Client;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Adminindex', function () {
    return view('admin.index');
});

Route::get('/Empleadoindex', function () {
    return view('empleado.index');
});


//prueba para inicio de sesion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('formlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
