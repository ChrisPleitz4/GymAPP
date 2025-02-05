<?php

use App\Models\Client;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientMembershipController;
use App\Http\Controllers\EmployeeController;
use Carbon\Carbon;

//Ruta inicio de sesion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');
//Rutas para los miembros
Route::resource('clients', ClientController::class)->names('clientes');
//prueba para inicio de sesion
Route::post('/welcome', [AuthController::class, 'login'])->name('formlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//rutas para la creacion de nuevas membresias 
Route::get('Clientes-Memebresia/{id}/create', [ClientMembershipController::class, 'create'])
    ->name('nuevaMembresia.create');

Route::post('Clientes-Memebresia', [ClientMembershipController::class, 'store'])
    ->name('nuevaMembresia.store');

//ruta para busqueda de clientes
Route::get('busqueda', [ClientController::class, 'search'])->name('busqueda');

//ruta para la creacion de nuevos empleados
Route::resource('empleados', EmployeeController::class)->names('empleados')->names('empleados');

//ruta para la creacion de nuevas membresias
Route::resource('membresias', MembershipController::class)->names('membresias');