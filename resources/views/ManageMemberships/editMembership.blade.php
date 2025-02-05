@extends(config('layouts.layouts.' . trim(auth()->user()->role->name)))
<script src="https://cdn.tailwindcss.com"></script>
@section('title','GESTION DE MEMBRESIAS GYM PLEITEZ') 
@section('description','Aqui podras modificar los datos de una membresia') 
@section('content')

        {{-- Formulario para agregar un nuevo empleado --}}

        <div class="bg-gray-100 flex justify-center py-12">
                <form action="{{route('membresias.update', $Membresia) }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 w-full max-w-md border-t-4 border-orange-500">
                 @csrf
                 @method('PUT')
                  <h2 class="text-2xl font-bold text-center text-black mb-6">Modificar Membresia</h2>
                  {{-- ID --}}
                  <div class="mb-4">
                    <label for="id" class="block text-black font-semibold mb-2">ID: {{$Membresia->id}}</label>

                    @error('id')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                    @enderror
                  </div>
                  <!-- Nombre -->
                  <div class="mb-4">
                    <label for="name" class="block text-black font-semibold mb-2">Nombre</label>
                    <input
                      type="text" id="name" name="name" value="{{$Membresia->name}}"
                      placeholder="Ingresa el nombre de la membresia"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                    @enderror
                  </div>
                    
                  <!-- duracion -->
                  <div class="mb-4">
                    <label for="duration" class="block text-black font-semibold mb-2">Duracion(En dias):</label>
                    <input
                      type="number"
                      name="duration"
                      value="{{ old('duration', $Membresia->duration) }}"	
                      placeholder="Ingresa la duracion de la membresia"
                      class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                      required
                    />
                @error('duracion')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                @enderror
                  </div>
                  <!-- precio -->
                  <div class="mb-4 relative">
                    <label for="price" class="block text-black font-semibold mb-2">Precio</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        value="{{old('price', $Membresia->price)}}"	
                        placeholder="Ingresa la nueva cuota de la membresia"	
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
                    @error('price')
                    <p class="text-red-500 text-sm mt-2">{!! $message !!}</p>
                    @enderror
                  </div>
                  <!-- descripcion -->
                  <div class="mb-4 relative">
                    <label for="description" class="block text-black font-semibold mb-2">Descripcion</label>
                    <input
                        type="text"
                        id="description"
                        name="description"
                        value="{{old('price', $Membresia->description)}}"	
                        placeholder="Ingresa la nueva descripcion de la membresia"	
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
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