@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE MEMBRESIAS GYM PLEITEZ') 
@section('description','Consulta de Membresias') 
@section('content')

      
@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">¡Éxito!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
    <button 
        type="button" 
        class="absolute top-0 bottom-0 right-0 px-4 py-3"
        onclick="this.parentElement.style.display='none';">
        <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Cerrar</title>
            <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414l2.934 2.934-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414l-2.934-2.934 2.934-2.934a1 1 0 000-1.414z"/>
        </svg>
    </button>
</div>
@endif
      
        <div class="max-w-2xl mx-auto mt-8 p-6 bg-gray-50 border border-gray-200 rounded-lg shadow-md">

            

         <!-- Información del Empleado -->
         <div class="mb-6">
            <h2 class="text-xl font-bold text-gray-800">Información de la membresia</h2>
            <p class="mt-2 text-gray-700"><span class="font-semibold">ID :</span> {{ $Membership->id }}</p>
            <p class="text-gray-700"><span class="font-semibold">Nombre:</span> {{ $Membership->name}}</p>
            <p class="text-gray-700"><span class="font-semibold">Duracion (En dias):</span> {{ $Membership->duration }}</p>
            <p class="text-gray-700"><span class="font-semibold">Precio</span> {{ $Membership->price }}</p>
            <p class="text-gray-700"><span class="font-semibold">Descripcion</span> {{ $Membership->description }}</p>
        </div>
        
        </div>
@endsection