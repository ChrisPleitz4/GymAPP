<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador Gym Pleitez</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <!-- Barra lateral fija -->
        <div class="w-64 bg-orange-600 text-white flex-shrink-0 overflow-y-auto fixed top-0 left-0 h-full z-10">
            <div class="flex items-center justify-center h-24 bg-black">
                <img src="{{ asset('images/logomenu.png') }}" alt="Logo" class="h-24">
            </div>
            <nav class="mt-8">
                <ul>
                    <li>
                        <a href="{{route('clientes.index')}}" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <img src="{{ asset('images/membresia.png') }}" alt="membresia" class="h-12 w-12">
                            <span class="ml-3">Consultar/Renovar Membresia</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{route('clientes.create')}}" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <img src="{{ asset('images/gestionarAtleta.png') }}" alt="membresia" class="h-12 w-12">
                            <span class="ml-3">Nuevo Atleta</span>
                        </a>
                    </li>

                    <li class="relative group">
                        <button onclick="toggleMenu('menuEmpleado')" class="w-full flex items-center py-3 px-4 hover:bg-orange-500 focus:outline-none">
                            <img src="{{ asset('images/empleado.png') }}" alt="Empleado" class="h-12 w-12">
                            <span class="ml-3">Gestionar Empleados</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="menuEmpleado" class="hidden bg-orange-500">
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Nuevo Empleado</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Consultar Empleados</a></li>
                        </ul>
                    </li>

                    <li class="relative group">
                        <button onclick="toggleMenu('menuMembresias')" class="w-full flex items-center py-3 px-4 hover:bg-orange-500 focus:outline-none">
                            <img src="{{ asset('images/personalizarMembresia.png') }}" alt="Membresias" class="h-12 w-12">
                            <span class="ml-3">Personalizar Membresías</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="menuMembresias" class="hidden bg-orange-500">
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Nueva Membresia</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Consultar Membresias Actuales</a></li>
                        </ul>
                    </li>

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
        <div class="flex-1 p-6 ml-64"> <!-- Asegura que el contenido no se superponga al menú -->
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
    </div>
    <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400">
        Regresar
    </a>
    <!-- JavaScript para manejar el despliegue de submenús -->
    <script>
        function toggleMenu(menuId) {
            const menu = document.getElementById(menuId);
            menu.classList.toggle('hidden');
        }
    </script>

</body>
</html>
