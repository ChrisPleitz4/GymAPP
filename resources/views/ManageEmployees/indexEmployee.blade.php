@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE EMPLEADOS GYM PLEITEZ') 
@section('description','Aqui podras consultar, Modificar y eliminar a los empleados actuales') 
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
                        <button 
                            class="px-3 py-1 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600 transition-colors duration-200"
                            onclick="openModal({{ $Employee->id }})">
                            Eliminar
                        </button>
                        <a href="{{route('empleados.show',[$Employee])}}" class="px-3 py-1 text-sm font-medium text-white bg-cyan-500 rounded-md hover:bg-cyan-600 transition-colors duration-200">
                            Ver
                        </a>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal de Confirmación --}}
<div id="confirmModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden">
    <div class="bg-white p-6 rounded shadow-md w-1/3">
        <h2 class="text-xl font-bold text-gray-700">¿Estás seguro?</h2>
        <p class="text-gray-600 mt-2">Esta acción eliminará al empleado. ¿Deseas continuar?</p>
        <div class="mt-4 flex justify-end space-x-4">
            <!-- Botón para cancelar -->
            <button
                class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400"
                onclick="closeModal()">
                Cancelar
            </button>
            <!-- Botón para confirmar -->
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Eliminar
                </button>
            </form>
        </div>
    </div>
    
</div>

<div class="mt-4">
    {{ $Employees->links() }}
</div>

<script>
    function openModal(id) {
        document.getElementById('deleteForm').action = `/empleados/${id}`;
        document.getElementById('confirmModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.add('hidden');
    }
</script>

@endsection
