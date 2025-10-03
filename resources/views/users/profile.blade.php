@extends('layouts.app')

@section('title', 'Mi Perfil - Huerto Virtual')

@section('content')
<div class="space-y-6">
    <!-- Header del perfil -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="h-32 bg-gradient-to-r from-green-400 to-green-600"></div>
        <div class="px-6 py-4 relative">
            <div class="flex items-center">
                <div class="flex-shrink-0 -mt-16">
                    <div class="h-24 w-24 rounded-full border-4 border-white bg-white shadow-lg flex items-center justify-center overflow-hidden">
                        @if($user->avatar)
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
                        @else
                            <div class="h-full w-full bg-green-500 flex items-center justify-center">
                                <span class="text-2xl font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="ml-6 mt-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-gray-600">{{ $user->email }}</p>
                    <div class="flex items-center mt-2 space-x-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-star mr-1"></i>
                            Nivel {{ $user->level }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-trophy mr-1"></i>
                            {{ $user->points }} puntos
                        </span>
                        @if($user->hasRole('administrador'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                <i class="fas fa-crown mr-1"></i>
                                Administrador
                            </span>
                        @endif
                    </div>
                </div>
                <div class="ml-auto mt-4">
                    <a href="{{ route('profile.edit') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                        <i class="fas fa-edit mr-2"></i>
                        Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Estadísticas detalladas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-chart-line text-blue-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Experiencia Total
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ number_format($user->experience) }} XP
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-trophy text-yellow-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Logros Desbloqueados
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ $achievements->count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-medal text-orange-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Posición en Ranking
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                #{{ $ranking }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información del usuario -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Información personal -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Información Personal
                </h3>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Nombre completo</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->email }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Miembro desde</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('d/m/Y') }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Última actualización</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $user->updated_at->diffForHumans() }}</dd>
                    </div>
                </dl>
                
                @if($user->bio)
                    <div class="mt-6">
                        <dt class="text-sm font-medium text-gray-500 mb-2">Biografía</dt>
                        <dd class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg">{{ $user->bio }}</dd>
                    </div>
                @endif
            </div>
        </div>

        <!-- Logros -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                    Logros Desbloqueados
                </h3>
                @if($achievements->count() > 0)
                    <div class="space-y-3 max-h-96 overflow-y-auto">
                        @foreach($achievements as $achievement)
                            <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <span class="text-2xl">{{ $achievement->icon }}</span>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900">{{ $achievement->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $achievement->description }}</p>
                                    <p class="text-xs text-gray-400">
                                        Desbloqueado: {{ $achievement->pivot->unlocked_at->format('d/m/Y H:i') }}
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
                    <div class="text-center py-8">
                        <i class="fas fa-trophy text-gray-300 text-4xl mb-2"></i>
                        <p class="text-gray-500 mb-2">Aún no has desbloqueado ningún logro</p>
                        <p class="text-sm text-gray-400">¡Comienza a cultivar para ganar tus primeros logros!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Acciones -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                Acciones
            </h3>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('profile.edit') }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700">
                    <i class="fas fa-edit mr-2"></i>
                    Editar Perfil
                </a>
                
                <a href="{{ route('profile.password') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-key mr-2"></i>
                    Cambiar Contraseña
                </a>
                
                <a href="{{ route('ranking') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    <i class="fas fa-trophy mr-2"></i>
                    Ver Ranking
                </a>
                
                @if(auth()->user()->hasRole('administrador'))
                    <a href="{{ route('admin.users.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-purple-300 text-sm font-medium rounded-md text-purple-700 bg-purple-50 hover:bg-purple-100">
                        <i class="fas fa-cog mr-2"></i>
                        Panel de Administración
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
