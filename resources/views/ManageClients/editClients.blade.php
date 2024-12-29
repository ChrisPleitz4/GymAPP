@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))

@section('title','Modificar los datos de un cliente') 
@section('description','Cambie el nombre o el telefono de un cliente') 

@section('content')
    <div class="bg-gray-100 flex justify-center py-12">
          @if (session('success'))
          <div id="successMessage" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
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
  
        <form action="{{route('clientes.update',$client)}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
         @csrf
         @method('PUT')
          <h2 class="text-2xl font-bold text-center text-black mb-6">Modificar Cliente</h2>
          <!-- Nombre -->
          <div class="mb-4">
            <label for="nombre" class="block text-black font-semibold mb-2">Nombre</label>
            <input
              type="text"
              name="name"
              value="{{$client->name}}"
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
                value="{{$client->PhoneNumber}}"
              placeholder="Ingresa el nuevo telefono del cliente"
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