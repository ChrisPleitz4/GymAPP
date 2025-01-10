@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE EMPLEADOS GYM PLEITEZ') 
@section('description','Aqui podras modificar los datos de un empleado registradp') 
@section('content')

        {{-- Formulario para agregar un nuevo empleado --}}

        <div class="bg-gray-100 flex justify-center py-12">
                <form action="{{route('empleados.update', $empleado) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
                 @csrf
                 @method('PUT')
                  <h2 class="text-2xl font-bold text-center text-black mb-6">Modificar Empleado</h2>
                  <!-- Nombre -->
                  <div class="mb-4">
                    <label for="name" class="block text-black font-semibold mb-2">Nombre</label>
                    <input
                      type="text" id="name" name="name" value="{{$empleado->name}}"
                      placeholder="Ingresa el nombre del empleado"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                    @enderror
                  </div>
                  <!-- Seleccionar rol (ComboBox) -->
                  <div class="mb-4">
                        <label for="role_type" class="block text-sm font-medium text-gray-700">Rol de empleado</label>
                        <select id="role_type" name="role_type"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                            <option value="">Seleccione el tipo de empleado</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->id }}" 
                                {{ (old('role_type', $empleado->role_id) == $rol->id) ? 'selected' : '' }}>
                                {{ $rol->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('role_type')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
            
                  <!-- correo -->
                  <div class="mb-4">
                    <label for="email" class="block text-black font-semibold mb-2">Correo Electronico</label>
                    <input
                      type="text"
                      name="email"
                      value="{{ old('email', $empleado->email) }}"	
                      placeholder="Ingresa el correo del cliente"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                @error('email')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                @enderror
                  </div>
                  <!-- Contraseña -->
                  <div class="mb-4 relative">
                    <label for="password" class="block text-black font-semibold mb-2">Nueva Contraseña</label>
                    <label for="text" class="block text-black font-semibold mb-2">(Si no deseea modificarla dejar campos VACIOS.)</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        value="{{old('password')}}"	
                        placeholder="Ingresa la nueva contraseña del empleado"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        
                    />
                    <button
                        type="button"
                        onclick="togglePassword('password', this)"
                        class="absolute inset-y-0 right-3 flex items-center"
                    >
                        <img src="https://cdn-icons-png.flaticon.com/512/709/709612.png" alt="Ver" class="w-5 h-5" id="password-icon" />
                    </button>
                  </div>

                  <!-- Confirmar Contraseña -->
                  <div class="mb-4 relative">
                    <label for="Cpassword" class="block text-black font-semibold mb-2">Confirmar Contraseña</label>
                    <input
                        type="password"
                        id="Cpassword"
                        name="Cpassword"
                        value="{{old('Cpassword')}}"	
                        placeholder="Ingresa de nuevo la nueva contraseña del empleado"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        
                    />
                    <button
                        type="button"
                        onclick="togglePassword('Cpassword', this)"
                        class="absolute inset-y-0 right-3 flex items-center"
                    >
                        <img src="https://cdn-icons-png.flaticon.com/512/709/709612.png" alt="Ver" class="w-5 h-5" id="Cpassword-icon" />
                    </button>
                    @error('password')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                    @enderror
                  </div>

                  <script>
                    function togglePassword(inputId, button) {
                        const input = document.getElementById(inputId);
                        const icon = button.querySelector('img');

                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.src = 'https://cdn-icons-png.flaticon.com/512/709/709611.png'; // Ícono de ojo abierto
                            icon.alt = 'Ocultar';
                        } else {
                            input.type = 'password';
                            icon.src = 'https://cdn-icons-png.flaticon.com/512/709/709612.png'; // Ícono de ojo cerrado
                            icon.alt = 'Ver';
                        }
                    }
                  </script>

                      
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