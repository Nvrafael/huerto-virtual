@extends('layouts.app')

@section('title', 'Dashboard - Huerto Virtual')

@section('content')
<div class="space-y-6">
    <!-- Header del Dashboard -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="h-12 w-12 rounded-full bg-green-100 flex items-center justify-center">
                        <i class="fas fa-seedling text-green-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            ¡Bienvenido de vuelta!
                        </dt>
                        <dd class="text-lg font-medium text-gray-900">
                            {{ $user->name }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas del usuario -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Puntos -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-star text-yellow-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Puntos Totales
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ number_format($user->points) }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nivel -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-level-up-alt text-blue-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Nivel Actual
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ $user->level }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Experiencia -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-chart-line text-green-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Experiencia
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ number_format($user->experience) }} XP
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logros -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-trophy text-orange-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Logros
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ $user->achievements()->count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progreso del nivel -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Progreso hacia el siguiente nivel
            </h3>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-green-600 h-2.5 rounded-full transition-all duration-300" 
                     style="width: {{ $levelProgress }}%"></div>
            </div>
            <div class="mt-2 flex justify-between text-sm text-gray-600">
                <span>Nivel {{ $user->level }}</span>
                <span>{{ $levelProgress }}%</span>
                <span>Nivel {{ $user->level + 1 }}</span>
            </div>
        </div>
    </div>

    <!-- Logros recientes y acciones rápidas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Logros recientes -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Logros Recientes
                </h3>
                @if($recentAchievements->count() > 0)
                    <div class="space-y-3">
                        @foreach($recentAchievements as $achievement)
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl">{{ $achievement->icon }}</span>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $achievement->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $achievement->description }}</p>
                                    <p class="text-xs text-gray-400">
                                        Desbloqueado: {{ $achievement->pivot->unlocked_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        +{{ $achievement->points_reward }} pts
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6">
                        <i class="fas fa-trophy text-gray-300 text-4xl mb-2"></i>
                        <p class="text-gray-500">Aún no has desbloqueado ningún logro</p>
                        <p class="text-sm text-gray-400">¡Comienza a cultivar para ganar tus primeros logros!</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Acciones rápidas -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Acciones Rápidas
                </h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('profile') }}" 
                       class="flex flex-col items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                        <i class="fas fa-user text-green-600 text-2xl mb-2"></i>
                        <span class="text-sm font-medium text-green-900">Mi Perfil</span>
                    </a>
                    
                    <a href="{{ route('ranking') }}" 
                       class="flex flex-col items-center p-4 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition-colors">
                        <i class="fas fa-trophy text-yellow-600 text-2xl mb-2"></i>
                        <span class="text-sm font-medium text-yellow-900">Ranking</span>
                    </a>
                    
                    <a href="{{ route('profile.edit') }}" 
                       class="flex flex-col items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                        <i class="fas fa-edit text-blue-600 text-2xl mb-2"></i>
                        <span class="text-sm font-medium text-blue-900">Editar Perfil</span>
                    </a>
                    
                    @if(auth()->user()->hasRole('administrador'))
                        <a href="{{ route('admin.users.index') }}" 
                           class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                            <i class="fas fa-cog text-purple-600 text-2xl mb-2"></i>
                            <span class="text-sm font-medium text-purple-900">Administrar</span>
                        </a>
                    @else
                        <div class="flex flex-col items-center p-4 bg-gray-50 rounded-lg">
                            <i class="fas fa-seedling text-gray-400 text-2xl mb-2"></i>
                            <span class="text-sm font-medium text-gray-500">Próximamente</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Información del rol -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Información de tu cuenta
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Rol</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        @if($user->hasRole('administrador'))
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                <i class="fas fa-crown mr-1"></i>
                                Administrador
                            </span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-user mr-1"></i>
                                Usuario
                            </span>
                        @endif
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Miembro desde</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('d/m/Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Última actualización</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $user->updated_at->diffForHumans() }}</dd>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
