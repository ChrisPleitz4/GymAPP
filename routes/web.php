<?php

use App\Models\Client;
use App\Models\Membership;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Adminindex', function () {
    return view('admin.index');
});

Route::get('/Empleadoindex', function () {
    return view('empleado.index');
});


