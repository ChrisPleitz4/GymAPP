@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
@section('title','Agregar un nuevo cliente') 
@section('description','Ingresar al sistema  clientes nuevos y asignarles su primera membresia') 
@section('content')


<div class="bg-gray-100 flex justify-center py-12">
    <form action="{{route('clientes.store')}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
     @csrf
      <h2 class="text-2xl font-bold text-center text-black mb-6">Nuevo Cliente</h2>
      <!-- Nombre -->
      <div class="mb-4">
        <label for="nombre" class="block text-black font-semibold mb-2">Nombre</label>
        <input
          type="text"
          name="name"
          placeholder="Ingresa el nombre del cliente"
          class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
          required
        />
      </div>
      <div class="mb-4">
        <label for="Telefono" class="block text-black font-semibold mb-2">Telefono</label>
        <input
          type="text"
          name="PhoneNumber"
          placeholder="Ingresa el Telefono del cliente"
          class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
          required
        />
      </div>
      
      <!-- Botón -->
      <div class="flex items-center justify-center">
        <button
          type="submit"
          class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-6 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-400"
        >
          Guardar
        </button>
      </div>
    </form>
  </div>
@endsection
