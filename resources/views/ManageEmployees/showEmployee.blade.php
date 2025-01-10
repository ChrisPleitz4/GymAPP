@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE EMPLEADOS GYM PLEITEZ') 
@section('description','Consulta de Empleado') 
@section('content')

        
      
        <div class="max-w-2xl mx-auto mt-8 p-6 bg-gray-50 border border-gray-200 rounded-lg shadow-md">
                @if (session('success'))
                <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
                    <div class="flex items-center p-3 bg-green-100 border border-green-400 text-green-700 rounded shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-4a1 1 0 11-2 0v-4a1 1 0 112 0v4zm-1-7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                        <div class="flex-grow">
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                        <button onclick="document.getElementById('successMessage').remove();" class="text-green-600 hover:text-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            

         <!-- Información del Empleado -->
         <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Información del Empleado</h2>
            <p class="mt-2 text-gray-700"><span class="font-semibold">ID Empleado:</span> {{ $empleado->id }}</p>
            <p class="text-gray-700"><span class="font-semibold">ROL Empleado:</span> {{ $empleado->nameRole()}}</p>
            <p class="text-gray-700"><span class="font-semibold">Nombre Empleado:</span> {{ $empleado->name }}</p>
            <p class="text-gray-700"><span class="font-semibold">Correo Empleado:</span> {{ $empleado->email }}</p>
            <p class="text-gray-700"><span class="font-semibold">Fecha de registro del Empleado:</span> {{ $empleado->diaRegistro() }}</p>
        </div>
        
        </div>
@endsection