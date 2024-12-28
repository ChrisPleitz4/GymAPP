<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

</head>

<body class="bg-cover bg-center h-screen">

    <!-- Contenedor que centra el contenido -->
    <div class="flex items-center justify-center h-full">
        
        <!-- Contenedor del formulario -->
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 opacity-90">
            <div class="absolute top-10 left-1/2 transform -translate-x-1/2">
                <!-- Usé max-h-32 para limitar el tamaño del logo -->
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-h-32">
            </div>

            <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Iniciar sesión</h2>
            
            {{-- Formulario --}}
            <form action="{{ route('formlogin') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Contraseña</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4">
                        <label for="remember" class="ml-2 text-gray-600">Recuérdame</label>
                    </div>
                    <a href="#" class="text-sm text-orange-600 hover:underline">¿Olvidaste la contraseña?</a>
                </div>

                <button type="submit" class="w-full mt-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 focus:outline-none">Iniciar sesión</button>
            </form>
           

        </div>
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
        
    </div>
   
</body>
</html>
