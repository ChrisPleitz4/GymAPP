@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE MEMBRESIAS GYM PLEITEZ') 
@section('description','Aqui podras registrar una nueva membresia') 
@section('content')

        {{-- Formulario para agregar un nuevo empleado --}}

        <div class="bg-gray-100 flex justify-center py-12">
                <form action="{{route('membresias.store')}}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
                 @csrf
                  <h2 class="text-2xl font-bold text-center text-black mb-6">Nueva Membresia</h2>
                  <!-- Nombre -->
                  <div class="mb-4">
                    <label for="name" class="block text-black font-semibold mb-2">Nombre</label>
                    <input
                      type="text" id="name" name="name" value="{{old('name')}}"
                      placeholder="Ingresa el nombre de la membresia"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                  </div>
            
                  <!-- correo -->
                  <div class="mb-4">
                    <label for="duration" class="block text-black font-semibold mb-2">Duracion (en dias)</label>
                    <input
                      type="number"
                      name="duration"
                      value="{{old('duration')}}"	
                      placeholder="Ingresa la duracion de la membresia"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                @error('duration')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                @enderror
                  </div>
                  {{-- Precio --}}
                  <div class="mb-4">
                    <label for="price" class="block text-black font-semibold mb-2">Precio</label>
                    <input
                      type="number"
                      name="price"
                      value="{{old('price')}}"	
                      placeholder="Ingresa la cuota de la membresia"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                      step="0.01"
                    />
                @error('price')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                @enderror
                  </div>
                  <!-- Descripcion -->
                  <div class="mb-4">
                    <label for="description" class="block text-black font-semibold mb-2">Descripcion</label>
                    <textarea
                        name="description"
                        placeholder="Ingresa la descripcion de la membresia"
                        class="w-full h-32 px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        required
                      >{{ old('description') }}
                    </textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                @enderror
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