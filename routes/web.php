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
use Carbon\Carbon;

//Ruta inicio de sesion
Route::get('/', [AuthController::class, 'showLoginForm'])->name('welcome');

//Route::get('/admin/{section}',[AuthController::class, 'Admin'])->name('admin.section');


Route::get('/emplado/{section}', function () {
    return view('empleado.index');
});

Route::get('/prueba', function () {
    // Encuentra el cliente con ID 1
    $client = Client::find(2);

    // Si el cliente existe
    if ($client) {
        // Asocia una nueva membresía al cliente (ID de membresía es 1)
        $startDate = Carbon::parse('2024-12-01');
        $endDate = $startDate->copy()->addDays(15); // Agregar 15 días a la fecha de inicio
        
        $client->memberships()->attach(2, [
            'start_date' => $startDate,  // Establece la fecha de inicio
            'end_date' => $endDate,      // Establece la fecha de finalización
        ]);
        
        
        return 'Membresía creada exitosamente.';
    }

    return 'Cliente no encontrado.';
});


//Rutas para los miembros
Route::resource('clients', ClientController::class)->names('clientes');
//prueba para inicio de sesion
Route::post('/admin/index', [AuthController::class, 'login'])->name('formlogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
