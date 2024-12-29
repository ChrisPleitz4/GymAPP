<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado Gym Pleitez</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- Barra lateral fija -->
        <div class="w-64 bg-orange-600 text-white flex-shrink-0 fixed top-0 left-0 h-full z-10">
            <div class="flex items-center justify-center h-24 bg-black">
                <img src="{{ asset('images/logomenu.png') }}" alt="Logo" class="h-24">
            </div>
            <nav class="mt-8">
                <ul>
                    <li>
                        <a href="{{route('clientes.index')}}" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <!-- Cambia el ícono de membresia -->
                            <img src="{{ asset('images/membresia.png') }}" alt="membresia" class="h-12 w-12">
                            <span class="ml-3">Consultar/Renovar Membresia</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{route('clientes.create')}}" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <!-- Cambia el ícono de membresia -->
                            <img src="{{ asset('images/gestionarAtleta.png') }}" alt="membresia" class="h-12 w-12">
                            <span class="ml-3">Nuevo Atleta</span>
                        </a>
                    </li>
                    <!-- Cerrar sesión -->
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            @csrf
                            <button type="submit" class="flex items-center w-full text-left">
                                <img src="{{ asset('images/cerrar-sesion.png') }}" alt="Cerrar sesión" class="h-12 w-12">
                                <span class="ml-3">Cerrar sesión</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-6 ml-64"> <!-- Espacio suficiente para evitar que se superponga al menú fijo -->
            <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-4">
                @yield('title', 'Bienvenido al Panel')
            </h1>
            
            <p class="mt-4 text-lg text-gray-600 text-center">
                @yield('description', 'Aquí puedes gestionar tu cuenta y acceder a todas las funcionalidades del sistema.')
            </p>
            
            <div class="mt-6 bg-gray-100 p-4 rounded-lg shadow-md r">
                <h2 class="text-2xl font-semibold text-gray-700">USUARIO ACTUAL</h2>
                <p class="text-xl text-gray-900 mt-2">
                    {{ Auth::user()->role->name }} - {{ Auth::user()->name }}
                </p>
            </div>
            
            @yield('content')
            
        </div>

    <!-- JavaScript para manejar el despliegue de submenús -->
    <script>
        function toggleMenu(menuId) {
            const menu = document.getElementById(menuId);
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>
