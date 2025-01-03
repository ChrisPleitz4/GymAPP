@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE EMPLEADOS GYM PLEITEZ') 
@section('description','Aqui podras consultar,Modificar y eliminar a los empleados actuales') 
@section('content')

{{-- Mostrar a los empleados Actuales  --}}
<div class="overflow-x-auto shadow-md rounded-lg font-sans">
    <table class="min-w-full table-auto">
        <thead class="bg-orange-600 text-white">
            <tr>
                <th class="py-3 px-4 text-center font-semibold text-lg">ID</th>
                <th class="py-3 px-4 text-center font-semibold text-lg">Rol</th>
                <th class="py-3 px-4 text-center font-semibold text-lg">Nombre</th>
                <th class="py-3 px-4 text-center font-semibold text-lg">Correo Electronico</th>
                <th class="py-3 px-4 text-center font-semibold text-lg">Registrado desde</th>
                <th class="py-3 px-4 text-center font-semibold text-lg">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($Employees as $Employee)
                <tr class="border-t hover:bg-gray-100 transition-all duration-300 rounded-lg">
                    <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $Employee->id }}</td>
                    <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $Employee->nameRole() }}</td>
                    <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $Employee->name }}</td>
                    <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $Employee->email }}</td>
                    <td class="py-3 px-4 text-center text-sm text-gray-800 bg-gray-50 rounded-lg">{{ $Employee->diaRegistro() }}</td>
                    
                    
                    <td class="py-3 px-4 text-center text-sm flex gap-2 justify-center">
                        <a href="{{ route('empleados.edit', [$Employee]) }}" class="px-3 py-1 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600 transition-colors duration-200">
                            Modificar
                        </a>
                        <a href="{{route('empleados.destroy',[$Employee])}}" class="px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors duration-200">
                            Eliminar
                        </a>
                        <a href="{{route('empleados.show',[$Employee])}}" class="px-3 py-1 text-sm font-medium text-white bg-cyan-500 rounded-md hover:bg-cyan-600 transition-colors duration-200">
                            Ver
                        </a>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
   
</div>

<div class="mt-4">
    {{ $Employees->links() }}
</div>


@endsection