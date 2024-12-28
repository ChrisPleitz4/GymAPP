<?php

use App\Models\Client;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');

Route::get('/admin/{section}',[AuthController::class, 'Admin'])->name('admin.section');
//Route::get('/admin/{section}', [AdminController::class, 'handleAdminSection'])->name('admin.section');


Route::get('/Empleadoindex', function () {
    return view('empleado.index');
});


//prueba para inicio de sesion
Route::post('/login', [AuthController::class, 'login'])->name('formlogin');
Route::get('/login', [AuthController::class, 'login'])->name('formlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
