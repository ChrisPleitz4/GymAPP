<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
</head>
@if ($errors->any())
            <div>
                <h2>ERROR/ES:</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif 
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
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-600">Contraseña</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500" required>
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
    </div>

</body>
</html>
