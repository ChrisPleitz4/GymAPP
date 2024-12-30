@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
@section('title','Asignar una membresia a un  cliente') 
@section('description','Asignar una  nueva membresia a un cliente') 
@section('content')
<div class="container mx-auto flex justify-center items-start py-6">
    <div class="w-full max-w-lg p-6 bg-white border-2 border-orange-500 rounded-lg shadow-md">
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Detalles de Membresía para {{ $client->name }}</h2>


        

        <!-- Formulario para renovar membresía -->
        <form action="{{ route('nuevaMembresia.store') }}" method="POST">
            @csrf
            
            <!-- ID y Nombre del Cliente -->
            <div class="mb-4">
                <label for="client_id" class="block text-sm font-medium text-gray-700">ID del Cliente</label>
                <input type="text" id="client_id" name="client_id" value="{{ $client->id }}" readonly
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="client_name" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                <input type="text" id="client_name" name="client_name" value="{{ $client->name }}" readonly
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <!-- Estado de la última membresía -->
            <div class="mb-4">
                <label for="last_membership_status" class="block text-sm font-medium text-gray-700">Estado de la Última Membresía</label>
                <input type="text" id="last_membership_status" name="last_membership_status" value="{{ $client->status() ?? 'No disponible' }}" readonly
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <!-- Nueva Membresía (ComboBox) -->
            <div class="mb-4">
                <label for="membership_type" class="block text-sm font-medium text-gray-700">Nueva Membresía</label>
                <select id="membership_type" name="membership_type"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    <option value="">Seleccione el tipo de membresía</option>
                    @foreach($membresias as $membresia)
                        <option value="{{ $membresia->id }}" data-price="{{ $membresia->price }}" data-duration="{{ $membresia->duration }}" data-description="{{ $membresia->description }}">
                            {{ $membresia->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Mostrar Precio, Duración y Descripción de la Membresía Seleccionada -->
            <div class="mb-4">
                <label for="membership_price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input type="text" id="membership_price" name="membership_price" value="Selecciona una membresía"
                    readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="membership_duration" class="block text-sm font-medium text-gray-700">Duración</label>
                <input type="text" id="membership_duration" name="membership_duration" value="Selecciona una membresía"
                    readonly class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="membership_description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="membership_description" name="membership_description" rows="4" readonly
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm"></textarea>
            </div>

            <!-- Botón de Guardar -->
            <div class="mb-4">
                <button type="submit"
                    class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    Guardar
                </button>
                
            </div>
        </form>
    </div>
</div>

{{-- Mensaje de error --}}

@if (session('error'))
    <div id="errorMessage" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
        <div class="flex items-center p-3 bg-red-100 border border-red-400 text-red-700 rounded shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-4a1 1 0 11-2 0v-4a1 1 0 112 0v4zm-1-7a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
            </svg>
            <div class="flex-grow">
                <p class="text-sm font-medium">{{ session('error') }}</p>
            </div>
            <button onclick="document.getElementById('errorMessage').remove();" class="text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
@endif
{{-- MENSAJE DE CLIENTE CREADO EXITOSAMENTE --}}
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

<!-- Script para actualizar precio, duración y descripción al seleccionar una membresía -->
<script>
    document.getElementById('membership_type').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        var duration = selectedOption.getAttribute('data-duration');
        var description = selectedOption.getAttribute('data-description');
        
        // Actualizar los campos de precio, duración y descripción
        document.getElementById('membership_price').value = price ? "$" + price : "Selecciona una membresía";
        document.getElementById('membership_duration').value = duration ? duration + " dias" : "Selecciona una membresía";
        document.getElementById('membership_description').value = description ? description : "Selecciona una membresía";
    });
</script>

    
    
    
 @endsection
    