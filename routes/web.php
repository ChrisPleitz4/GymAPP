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
use Carbon\Carbon;

//Ruta inicio de sesion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');
//Rutas para los miembros
Route::resource('clients', ClientController::class)->names('clientes');
//prueba para inicio de sesion
Route::post('/welcome', [AuthController::class, 'login'])->name('formlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/prueba',function(){
    $user = Client::find(1);
        $user->memberships()->attach(1, [
            'start_date' => now(),  // o la fecha que desees
            'end_date' => now()->addDays(15)  // o la fecha que desees
        ]);

    return "membresia creada";
} );

//rutas para la creacion de nuevas membresias 
Route::get('Clientes-Memebresia/{id}/create', [ClientMembershipController::class, 'create'])
    ->name('nuevaMembresia.create');

Route::post('Clientes-Memebresia', [ClientMembershipController::class, 'store'])
    ->name('nuevaMembresia.store');

