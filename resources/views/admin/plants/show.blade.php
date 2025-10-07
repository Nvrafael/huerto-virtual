@extends('layouts.app')

@section('title', 'Detalle de Planta')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">{{ $plant->name }}</h1>
        <a href="{{ route('admin.plants.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-1"></i> Volver
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
            <div class="md:col-span-1 p-6">
                @if($plant->image_path)
                    <img src="{{ asset('storage/' . $plant->image_path) }}" alt="{{ $plant->name }}" class="w-full h-48 object-cover rounded">
                @else
                    <div class="w-full h-48 rounded bg-gray-100 flex items-center justify-center text-gray-400">
                        <i class="fas fa-image text-3xl"></i>
                    </div>
                @endif
            </div>
            <div class="md:col-span-2 p-6 space-y-4">
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Tiempo de crecimiento</h2>
                    <p class="text-lg text-gray-900">{{ $plant->growth_time_days }} días</p>
                </div>
                <div>
                    <h2 class="text-sm font-medium text-gray-500">Descripción</h2>
                    <p class="text-gray-700">{{ $plant->description ?? 'Sin descripción.' }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('admin.plants.edit', $plant) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            <i class="fas fa-edit mr-2"></i> Editar
        </a>
        <form action="{{ route('admin.plants.destroy', $plant) }}" method="POST" onsubmit="return confirm('¿Eliminar esta planta?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                <i class="fas fa-trash mr-2"></i> Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
