@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','Consulta Especifica de Cliente') 
@section('description','Aqui podras consultar los datos de un cliente en especifico') 
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
<div class="max-w-2xl mx-auto mt-8 p-6 bg-gray-50 border border-gray-200 rounded-lg shadow-md">

  
    
    <!-- Información del cliente -->
    <div class="mb-6">
        <h2 class="text-xl font-bold text-gray-800">Información del Cliente</h2>
        <p class="mt-2 text-gray-700"><span class="font-semibold">ID Cliente:</span> {{ $client->id }}</p>
        <p class="text-gray-700"><span class="font-semibold">Nombre Cliente:</span> {{ $client->name }}</p>
        <p class="text-gray-700"><span class="font-semibold">Teléfono Cliente:</span> {{ $client->PhoneNumber }}</p>
    </div>

    <!-- Información de membresías -->
    <div>
        <!-- Última Membresía -->
        <h2 class="text-xl font-bold text-gray-800 mb-4">Última Membresía</h2>
        @if ($client->lastClientMembership())
            <div class="mt-4 p-4 bg-white border rounded-md shadow-sm">
                <p class="text-gray-700"><span class="font-semibold">ESTADO:</span> {{ $client->lastClientMembership()->status() }}</p>
                <p class="text-gray-700"><span class="font-semibold">Membresía:</span> {{ $client->lastClientMembership()->name }}</p>
                <p class="text-gray-700"><span class="font-semibold">Precio:</span> ${{ $client->lastClientMembership()->price }}</p>
                <p class="text-gray-700"><span class="font-semibold">Descripción:</span> {{ $client->lastClientMembership()->description }}</p>
                <p class="text-gray-700"><span class="font-semibold">Fecha de inicio:</span> {{ $client->lastClientMembership()->pivot->start_date }}</p>
                <p class="text-gray-700"><span class="font-semibold">Fecha de fin:</span> {{ $client->lastClientMembership()->pivot->end_date }}</p>
            </div>
        @else
            <p class="mt-4 text-gray-500">No hay membresía actual.</p>
        @endif

        <!-- Otras Membresías Asociadas -->
        <h2 class="text-xl font-bold text-gray-800 mt-8">Otras Membresías Asociadas</h2>
        @forelse ($memberships as $membership)
            @if ($membership != $client->lastClientMembership())
            <div class="mt-4 p-4 bg-white border rounded-md shadow-sm">
                <p class="text-gray-700"><span class="font-semibold">ESTADO:</span> {{ $membership->status() }}</p>
                <p class="text-gray-700"><span class="font-semibold">Membresía:</span> {{ $membership->name }}</p>
                <p class="text-gray-700"><span class="font-semibold">Precio:</span> ${{ $membership->price }}</p>
                <p class="text-gray-700"><span class="font-semibold">Descripción:</span> {{ $membership->description }}</p>
                <p class="text-gray-700"><span class="font-semibold">Fecha de inicio:</span> {{ $membership->pivot->start_date }}</p>
                <p class="text-gray-700"><span class="font-semibold">Fecha de fin:</span> {{ $membership->pivot->end_date }}</p>
            </div>
            @endif
        @empty
            <p class="mt-4 text-gray-500">No hay otras membresías asociadas.</p>
        @endforelse

            <!-- Enlaces de paginación -->
    <div class="mt-4">
        {{ $memberships->links() }}
    </div>
    </div>
</div>


@endsection