@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','Consulta y renovacion de Membresias') 
@section('description','Aqui podras consultar membresias de clientes y crear o renovar membresias') 
@section('content')
   
    <div class="overflow-x-auto shadow-md rounded-lg font-sans">
        <table class="min-w-full table-auto">
            <thead class="bg-orange-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-center font-semibold text-lg">ID</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Nombre</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Inicio Membresia</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Fin Membresia</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Estado</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Tipo Membresia</th>
                    <th class="py-3 px-4 text-center font-semibold text-lg">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($clients as $client)
                    <tr class="border-t hover:bg-gray-100 transition-all duration-300 rounded-lg">
                        <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $client->id }}</td>
                        <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $client->name }}</td>
                        <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $client->startDate() }}</td>
                        <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $client->endDate() }}</td>
                        <td class="py-3 px-4 text-center text-sm text-white {{ $client->status() == 'Activa' ? 'bg-green-500' : 'bg-red-500' }} rounded-lg">
                            {{ $client->status() }}
                        </td>
                        <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">
                            <span class="px-2 py-1 bg-blue-100 rounded-lg">{{ $client->description() }}</span>
                        </td>
                        <td class="py-3 px-4 text-center text-sm flex gap-2 justify-center">
                            <a href="{{ route('clientes.edit', [$client]) }}" class="px-3 py-1 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600 transition-colors duration-200">
                                Modificar
                            </a>
                            <a href="{{route('nuevaMembresia.create',['id' => $client->id])}}" class="px-3 py-1 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600 transition-colors duration-200">
                                Renovar
                            </a>
                            <a href="{{route('clientes.show',[$client])}}" class="px-3 py-1 text-sm font-medium text-white bg-cyan-500 rounded-md hover:bg-cyan-600 transition-colors duration-200">
                                Ver
                            </a>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
       
    </div>
    <div class="mt-4">
        {{ $clients->links() }}
    </div>
    
    
@endsection
