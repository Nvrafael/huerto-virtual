@extends('layouts.app')

@section('title', 'Ranking - Huerto Virtual')

@section('content')
<div class="space-y-6">
    <!-- Header del ranking -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Ranking de Usuarios</h1>
                    <p class="mt-1 text-sm text-gray-600">
                        Los mejores agricultores del Huerto Virtual
                    </p>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-trophy text-yellow-500 text-2xl mr-2"></i>
                    <span class="text-sm font-medium text-gray-500">Top {{ $users->count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Ranking -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:p-6">
            <div class="space-y-4">
                @foreach($users as $index => $user)
                    <div class="flex items-center p-4 rounded-lg {{ $loop->first ? 'bg-yellow-50 border-2 border-yellow-200' : ($loop->iteration <= 3 ? 'bg-gray-50' : 'bg-white hover:bg-gray-50') }} transition-colors">
                        <!-- Posición -->
                        <div class="flex-shrink-0 w-12 text-center">
                            @if($loop->first)
                                <div class="inline-flex items-center justify-center w-8 h-8 bg-yellow-500 text-white rounded-full text-sm font-bold">
                                    <i class="fas fa-crown"></i>
                                </div>
                            @elseif($loop->iteration == 2)
                                <div class="inline-flex items-center justify-center w-8 h-8 bg-gray-400 text-white rounded-full text-sm font-bold">
                                    2
                                </div>
                            @elseif($loop->iteration == 3)
                                <div class="inline-flex items-center justify-center w-8 h-8 bg-orange-500 text-white rounded-full text-sm font-bold">
                                    3
                                </div>
                            @else
                                <span class="text-sm font-medium text-gray-500">#{{ $loop->iteration }}</span>
                            @endif
                        </div>

                        <!-- Avatar -->
                        <div class="flex-shrink-0 ml-4">
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center overflow-hidden">
                                @if($user->avatar)
                                    <img class="h-full w-full object-cover" src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}">
                                @else
                                    <div class="h-full w-full bg-green-500 flex items-center justify-center">
                                        <span class="text-sm font-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Información del usuario -->
                        <div class="ml-4 flex-1 min-w-0">
                            <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $user->name }}
                                    @if($user->id === auth()->id())
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 ml-2">
                                            Tú
                                        </span>
                                    @endif
                                </p>
                            </div>
                            <div class="flex items-center mt-1 space-x-4">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                                    {{ number_format($user->points) }} puntos
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-level-up-alt text-blue-500 mr-1"></i>
                                    Nivel {{ $user->level }}
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="fas fa-chart-line text-green-500 mr-1"></i>
                                    {{ number_format($user->experience) }} XP
                                </div>
                            </div>
                        </div>

                        <!-- Estadísticas adicionales -->
                        <div class="flex-shrink-0 ml-4 text-right">
                            <div class="text-sm">
                                @if($user->hasRole('administrador'))
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        <i class="fas fa-crown mr-1"></i>
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-user mr-1"></i>
                                        Usuario
                                    </span>
                                @endif
                            </div>
                            <div class="text-xs text-gray-500 mt-1">
                                {{ $user->achievements()->count() }} logros
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Tu posición -->
        <div class="bg-white shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-user text-blue-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Tu Posición
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                @php
                                    $userRank = $users->search(function($user) {
                                        return $user->id === auth()->id();
                                    });
                                    $userRank = $userRank !== false ? $userRank + 1 : 'N/A';
                                @endphp
                                #{{ $userRank }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total de usuarios -->
        <div class="bg-white shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-users text-green-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Usuarios
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ \App\Models\User::count() }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Promedio de puntos -->
        <div class="bg-white shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-chart-bar text-purple-500 text-2xl"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Promedio Puntos
                            </dt>
                            <dd class="text-lg font-medium text-gray-900">
                                {{ number_format(\App\Models\User::avg('points')) }}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Consejos para mejorar -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                Consejos para mejorar tu ranking
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="flex items-start p-3 bg-green-50 rounded-lg">
                    <i class="fas fa-seedling text-green-600 mt-1 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-green-900">Planta semillas</h4>
                        <p class="text-sm text-green-700">Cada planta te da puntos de experiencia</p>
                    </div>
                </div>
                
                <div class="flex items-start p-3 bg-yellow-50 rounded-lg">
                    <i class="fas fa-calendar-check text-yellow-600 mt-1 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-yellow-900">Visita diariamente</h4>
                        <p class="text-sm text-yellow-700">Mantén una racha de visitas consecutivas</p>
                    </div>
                </div>
                
                <div class="flex items-start p-3 bg-blue-50 rounded-lg">
                    <i class="fas fa-trophy text-blue-600 mt-1 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-blue-900">Completa logros</h4>
                        <p class="text-sm text-blue-700">Desbloquea logros para ganar puntos extra</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
