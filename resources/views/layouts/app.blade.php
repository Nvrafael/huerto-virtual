<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Huerto Virtual')</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navegación -->
    <nav class="bg-green-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ route('dashboard') }}" class="flex items-center text-white text-xl font-bold">
                        <i class="fas fa-seedling mr-2"></i>
                        Huerto Virtual
                    </a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Menú de usuario autenticado -->
                        <div class="hidden md:flex items-center space-x-4">
                            <a href="{{ route('dashboard') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                                <i class="fas fa-home mr-1"></i> Dashboard
                            </a>
                            <a href="{{ route('ranking') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                                <i class="fas fa-trophy mr-1"></i> Ranking
                            </a>
                            <a href="{{ route('profile') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                                <i class="fas fa-user mr-1"></i> Perfil
                            </a>
                            
                            @if(auth()->user()->hasRole('administrador'))
                                <a href="{{ route('admin.users.index') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                                    <i class="fas fa-users-cog mr-1"></i> Usuarios
                                </a>
                                <a href="{{ route('admin.plants.index') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                                    <i class="fas fa-seedling mr-1"></i> Plantas
                                </a>
                            @endif
                        </div>

                        <!-- Dropdown del usuario -->
                        <div class="relative">
                            <button class="flex items-center text-white hover:text-green-200 focus:outline-none" onclick="toggleDropdown()">
                                <img class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center" 
                                     src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) . '&background=10b981&color=fff' }}" 
                                     alt="{{ auth()->user()->name }}">
                                <span class="ml-2 hidden md:block">{{ auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down ml-1"></i>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <div class="px-4 py-2 border-b">
                                    <p class="text-sm text-gray-900 font-medium">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                                    <div class="flex items-center mt-1">
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">
                                            Nivel {{ auth()->user()->level }}
                                        </span>
                                        <span class="text-xs text-gray-500 ml-2">
                                            {{ auth()->user()->points }} pts
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user mr-2"></i> Mi Perfil
                                </a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-edit mr-2"></i> Editar Perfil
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Menú para usuarios no autenticados -->
                        <a href="{{ route('login') }}" class="text-white hover:text-green-200 px-3 py-2 rounded-md">
                            <i class="fas fa-sign-in-alt mr-1"></i> Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="bg-green-700 text-white hover:bg-green-800 px-4 py-2 rounded-md">
                            <i class="fas fa-user-plus mr-1"></i> Registrarse
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="max-w-7xl mx-auto py-6 px-4">
        <!-- Mensajes de sesión -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <strong>Por favor corrige los siguientes errores:</strong>
                </div>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <div class="flex items-center justify-center mb-4">
                <i class="fas fa-seedling mr-2 text-green-400"></i>
                <span class="text-xl font-bold">Huerto Virtual</span>
            </div>
            <p class="text-gray-400 mb-4">
                Desarrollado para el TFG de FP Superior de Desarrollo de Aplicaciones Web
            </p>
            <div class="flex justify-center space-x-6 text-sm text-gray-400">
                <span>&copy; {{ date('Y') }} Huerto Virtual. Todos los derechos reservados.</span>
            </div>
        </div>
    </footer>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Cerrar dropdown al hacer click fuera
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = event.target.closest('button');
            
            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleDropdown') === -1) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
