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

    <div class="flex h-screen">
        <!-- Barra lateral -->
        <div class="w-64 bg-orange-600 text-white flex-shrink-0">
            <div class="flex items-center justify-center h-24 bg-black">
                <img src="{{ asset('images/logomenu.png') }}" alt="Logo" class="h-24">
            </div>
            <nav class="mt-8">
                <ul>
                    <li>
                        <a href="#" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <!-- Cambia el ícono de membresia -->
                            <img src="{{ asset('images/membresia.png') }}" alt="membresia" class="h-12 w-12">
                            <span class="ml-3">Consultar Membresia</span>
                        </a>
                    </li>
                    <!-- Opción con submenú -->
                    <li class="relative group">
                        <button onclick="toggleMenu('menuAtleta')" class="w-full flex items-center py-3 px-4 hover:bg-orange-500 focus:outline-none">
                            <!-- Aquí puedes cambiar el ícono -->
                            <img src="{{ asset('images/gestionarAtleta.png') }}" alt="Atleta" class="h-12 w-12">
                            <span class="ml-3">Gestionar Atletas</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="menuAtleta" class="hidden bg-orange-500">
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Nuevo Atleta</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Renovar Membresia</a></li>
                        </ul>
                    </li>

                    <!-- Otra opción con submenú -->
                    <li class="relative group">
                        <button onclick="toggleMenu('menuEmpleado')" class="w-full flex items-center py-3 px-4 hover:bg-orange-500 focus:outline-none">
                            <!-- Cambia este ícono también -->
                            <img src="{{ asset('images/empleado.png') }}" alt="Empleado" class="h-12 w-12">
                            <span class="ml-3">Gestionar Empleados</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="menuEmpleado" class="hidden bg-orange-500">
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Nuevo Empleado</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Modificar Empleado</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Eliminar Empleado</a></li>
                        </ul>
                    </li>

                     <!-- Otra opción con submenú -->
                     <li class="relative group">
                        <button onclick="toggleMenu('menuMembresias')" class="w-full flex items-center py-3 px-4 hover:bg-orange-500 focus:outline-none">
                            <!-- Cambia este ícono también -->
                            <img src="{{ asset('images/personalizarMembresia.png') }}" alt="Membresias" class="h-12 w-12">
                            <span class="ml-3">Personalizar Membresías</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="menuMembresias" class="hidden bg-orange-500">
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Nueva Membresia</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Modificar Membresia</a></li>
                            <li><a href="#" class="block px-6 py-2 hover:bg-orange-400">Eliminar Membresia</a></li>
                        </ul>
                    </li>

                    <!-- Cerrar sesión -->
                    <li>
                        <a href="#" class="flex items-center py-3 px-4 hover:bg-orange-500">
                            <!-- Cambia el ícono de cerrar sesión -->
                            <img src="{{ asset('images/cerrar-sesion.png') }}" alt="Cerrar sesión" class="h-12 w-12">
                            <span class="ml-3">Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Contenido principal -->
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold text-gray-800">Bienvenido al panel</h1>
            <p class="mt-4 text-gray-600">Aquí puedes gestionar tu cuenta y acceder a todas las funcionalidades del sistema.</p>
            @yield('content')
        </div>
        
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
