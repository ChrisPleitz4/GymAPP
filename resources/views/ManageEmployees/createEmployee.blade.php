@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE EMPLEADOS GYM PLEITEZ') 
@section('description','Aqui podras registrar a un nuevo empleado') 
@section('content')

        {{-- Formulario para agregar un nuevo empleado --}}

        <div class="bg-gray-100 flex justify-center py-12">
                <form action="{{route('clientes.store')}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
                 @csrf
                  <h2 class="text-2xl font-bold text-center text-black mb-6">Nuevo Empleado</h2>
                  <!-- Nombre -->
                  <div class="mb-4">
                    <label for="nombre" class="block text-black font-semibold mb-2">Nombre</label>
                    <input
                      type="text"
                      name="name"
                      value="{{old('name')}}"	
                      placeholder="Ingresa el nombre del empleado"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                  </div>
                  <!-- Seleccionar rol (ComboBox) -->
            <div class="mb-4">
                <label for="role_type" class="block text-sm font-medium text-gray-700">Rol de empleado</label>
                <select id="role_type" name="role_type"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    <option value="">Seleccione el tipo de empleado</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">
                            {{ $rol->name }}
                        </option>
                    @endforeach
                </select>
            </div>
                  <!-- correo -->
                  <div class="mb-4">
                    <label for="email" class="block text-black font-semibold mb-2">Correo Electronico</label>
                    <input
                      type="text"
                      name="email"
                      value="{{old('email')}}"	
                      placeholder="Ingresa el correo del cliente"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                  </div>
                  <!-- contraseñá -->
                  <div class="mb-4">
                        <label for="contraseña" class="block text-black font-semibold mb-2">Contraseña</label>
                        <input
                          type="password"
                          name="password"
                          value="{{old('password')}}"	
                          placeholder="Ingresa la contraseña del empleado"
                          class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                          required
                        />
                      </div>
                      <div class="mb-4">
                        <label for="Ccontraseña" class="block text-black font-semibold mb-2">Confirmar Contraseña</label>
                        <input
                          type="password"
                          name="Cpassword"
                          value="{{old('Cpassword')}}"	
                          placeholder="Ingresa de nuevo la contraseña del empleado"
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