<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>🌱 Huerto Virtual - Cuida tu huerto digital</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
                @import 'tailwindcss';
            </style>
        @endif
    </head>
    <body class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 dark:from-gray-900 dark:via-green-900 dark:to-emerald-900 min-h-screen font-inter">
        <!-- Navigation -->
        <nav class="absolute top-0 left-0 right-0 z-50 p-6">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-seedling text-white text-sm"></i>
                    </div>
                    <span class="text-xl font-bold text-green-600 dark:text-green-400">Huerto Virtual</span>
                </div>
                
            @if (Route::has('login'))
                    <div class="flex items-center space-x-4">
                    @auth
                            <a href="{{ url('/dashboard') }}" 
                               class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                    @else
                            <a href="{{ route('login') }}" 
                               class="text-gray-700 dark:text-gray-300 hover:text-green-600 dark:hover:text-green-400 font-medium transition-colors duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                            </a>
                        @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-plus mr-2"></i>Registrarse
                            </a>
                        @endif
                    @endauth
                    </div>
                @endif
            </div>
                </nav>

        <!-- Hero Section -->
        <div class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-green-300 dark:bg-green-700 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-emerald-300 dark:bg-emerald-700 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute top-40 left-40 w-80 h-80 bg-teal-300 dark:bg-teal-700 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
            </div>

            <div class="relative z-10 max-w-7xl mx-auto px-6 py-20">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <!-- Content -->
                    <div class="text-center lg:text-left">
                        <div class="inline-flex items-center bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 px-4 py-2 rounded-full text-sm font-medium mb-6">
                            <i class="fas fa-leaf mr-2"></i>
                            ¡Bienvenido al futuro de la agricultura!
                        </div>
                        
                        <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                            Cultiva tu
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-emerald-600">
                                Jardín Digital
                            </span>
                        </h1>
                        
                        <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed max-w-2xl">
                            Descubre una nueva forma de conectar con la naturaleza a través de nuestro huerto virtual gamificado. 
                            Planta, cultiva, compite y aprende mientras construyes tu jardín perfecto.
                        </p>

                        <!-- Features -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-seedling text-white text-2xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Planta Virtual</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Cultiva plantas digitales</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-trophy text-white text-2xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Gana Puntos</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Compite en rankings</p>
                            </div>
                            <div class="text-center">
                                <div class="w-16 h-16 bg-teal-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                    <i class="fas fa-star text-white text-2xl"></i>
                                </div>
                                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Desbloquea Logros</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">Sube de nivel</p>
                            </div>
                        </div>

                        <!-- CTA Buttons -->
                        @guest
                            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                <a href="{{ route('register') }}" 
                                   class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <i class="fas fa-seedling mr-3"></i>
                                    🌱 Comenzar a Cultivar
                                </a>
                                <a href="{{ route('login') }}" 
                                   class="border-2 border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 flex items-center justify-center">
                                    <i class="fas fa-sign-in-alt mr-3"></i>
                                    Iniciar Sesión
                                </a>
                            </div>
                        @else
                            <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                                <a href="{{ route('dashboard') }}" 
                                   class="bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <i class="fas fa-seedling mr-3"></i>
                                    🌱 Ir a mi Huerto
                                </a>
                                <a href="{{ route('ranking') }}" 
                                   class="border-2 border-green-500 text-green-500 hover:bg-green-500 hover:text-white px-8 py-4 rounded-full font-semibold text-lg transition-all duration-300 flex items-center justify-center">
                                    <i class="fas fa-trophy mr-3"></i>
                                    🏆 Ver Ranking
                                </a>
                            </div>
                        @endguest
                    </div>

                    <!-- Visual -->
                    <div class="relative">
                        <div class="relative z-10">
                            <!-- Main Garden Card -->
                            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                                <div class="text-center mb-6">
                                    <div class="w-20 h-20 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                                        <i class="fas fa-seedling text-white text-3xl"></i>
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Mi Huerto</h3>
                                    <p class="text-gray-600 dark:text-gray-400">Nivel 5 • 1,250 puntos</p>
                                </div>
                                
                                <!-- Garden Grid -->
                                <div class="grid grid-cols-3 gap-3 mb-6">
                                    <div class="w-16 h-16 bg-green-200 dark:bg-green-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-seedling text-green-600 dark:text-green-400"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-yellow-200 dark:bg-yellow-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-sun text-yellow-600 dark:text-yellow-400"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-blue-200 dark:bg-blue-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-tint text-blue-600 dark:text-blue-400"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-purple-200 dark:bg-purple-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-leaf text-purple-600 dark:text-purple-400"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-red-200 dark:bg-red-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-apple-alt text-red-600 dark:text-red-400"></i>
                                    </div>
                                    <div class="w-16 h-16 bg-orange-200 dark:bg-orange-800 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-carrot text-orange-600 dark:text-orange-400"></i>
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-600 dark:text-gray-400">Progreso</span>
                                    <span class="text-green-600 dark:text-green-400 font-semibold">75%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mt-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>

                            <!-- Floating Achievement Cards -->
                            <div class="absolute -top-4 -right-4 bg-yellow-400 rounded-xl p-3 shadow-lg transform -rotate-12 hover:rotate-0 transition-transform duration-300">
                                <i class="fas fa-trophy text-white text-xl"></i>
                            </div>
                            <div class="absolute -bottom-4 -left-4 bg-blue-500 rounded-xl p-3 shadow-lg transform rotate-12 hover:rotate-0 transition-transform duration-300">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="relative z-10 bg-white dark:bg-gray-800 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Características del Juego
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-400">
                        Descubre todas las funcionalidades que te esperan en tu huerto virtual
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Característica 1 -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 dark:from-green-900 dark:to-emerald-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-green-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-seedling text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Sistema de Plantación</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Planta semillas virtuales, cuida tu huerto y ve cómo crecen tus cultivos digitales. 
                            Cada planta tiene sus propias necesidades y tiempos de crecimiento.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Múltiples tipos de plantas</li>
                            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Sistema de riego inteligente</li>
                            <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Crecimiento en tiempo real</li>
                        </ul>
                    </div>

                    <!-- Característica 2 -->
                    <div class="bg-gradient-to-br from-yellow-50 to-orange-50 dark:from-yellow-900 dark:to-orange-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-yellow-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Sistema de Puntos</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Gana puntos por cada acción que realices en tu huerto. Planta, riega, cosecha y 
                            desbloquea nuevas plantas para acumular más puntos.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-yellow-500 mr-2"></i> Puntos por actividades</li>
                            <li class="flex items-center"><i class="fas fa-check text-yellow-500 mr-2"></i> Bonificaciones especiales</li>
                            <li class="flex items-center"><i class="fas fa-check text-yellow-500 mr-2"></i> Sistema de niveles</li>
                        </ul>
                    </div>

                    <!-- Característica 3 -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 dark:from-purple-900 dark:to-pink-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-purple-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Logros y Ranking</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Desbloquea logros especiales completando objetivos y compite con otros jugadores 
                            en el ranking global de agricultores virtuales.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i> Logros únicos</li>
                            <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i> Ranking global</li>
                            <li class="flex items-center"><i class="fas fa-check text-purple-500 mr-2"></i> Competencias semanales</li>
                        </ul>
                    </div>

                    <!-- Característica 4 -->
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-900 dark:to-cyan-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-blue-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-user-cog text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Gestión de Usuarios</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Sistema completo de perfiles, roles y administración. Los administradores pueden 
                            gestionar el catálogo de plantas y usuarios.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i> Perfiles personalizables</li>
                            <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i> Roles diferenciados</li>
                            <li class="flex items-center"><i class="fas fa-check text-blue-500 mr-2"></i> Panel de administración</li>
                        </ul>
                    </div>

                    <!-- Característica 5 -->
                    <div class="bg-gradient-to-br from-teal-50 to-green-50 dark:from-teal-900 dark:to-green-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-teal-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-chart-line text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Progreso y Estadísticas</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Sigue tu progreso con estadísticas detalladas, gráficos de crecimiento y 
                            métricas de rendimiento de tu huerto virtual.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-teal-500 mr-2"></i> Dashboard personalizado</li>
                            <li class="flex items-center"><i class="fas fa-check text-teal-500 mr-2"></i> Estadísticas en tiempo real</li>
                            <li class="flex items-center"><i class="fas fa-check text-teal-500 mr-2"></i> Historial de actividades</li>
                    </ul>
                    </div>

                    <!-- Característica 6 -->
                    <div class="bg-gradient-to-br from-red-50 to-pink-50 dark:from-red-900 dark:to-pink-900 p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                        <div class="w-16 h-16 bg-red-500 rounded-2xl flex items-center justify-center mb-6">
                            <i class="fas fa-mobile-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Multiplataforma</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Accede a tu huerto desde cualquier dispositivo. Diseño responsive que se adapta 
                            perfectamente a móviles, tablets y escritorio.
                        </p>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center"><i class="fas fa-check text-red-500 mr-2"></i> Diseño responsive</li>
                            <li class="flex items-center"><i class="fas fa-check text-red-500 mr-2"></i> Compatible con móviles</li>
                            <li class="flex items-center"><i class="fas fa-check text-red-500 mr-2"></i> Modo oscuro</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="relative z-10 bg-gradient-to-r from-green-500 to-emerald-600 dark:from-green-600 dark:to-emerald-700 py-20">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-white mb-4">
                        Únete a la Comunidad
                    </h2>
                    <p class="text-xl text-green-100">
                        Más de 10,000 agricultores digitales ya están cultivando
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">10K+</div>
                        <div class="text-green-100">Usuarios Activos</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">50K+</div>
                        <div class="text-green-100">Plantas Cultivadas</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">1M+</div>
                        <div class="text-green-100">Puntos Ganados</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white mb-2">100+</div>
                        <div class="text-green-100">Logros Desbloqueados</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Animations -->
        <style>
            @keyframes blob {
                0% {
                    transform: translate(0px, 0px) scale(1);
                }
                33% {
                    transform: translate(30px, -50px) scale(1.1);
                }
                66% {
                    transform: translate(-20px, 20px) scale(0.9);
                }
                100% {
                    transform: translate(0px, 0px) scale(1);
                }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>