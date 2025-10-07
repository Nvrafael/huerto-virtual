@extends('layouts.app')

@section('title', 'Editar Planta')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Editar Planta</h1>
        <a href="{{ route('admin.plants.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-1"></i> Volver
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('admin.plants.update', $plant) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $plant->name) }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tiempo de crecimiento (días)</label>
                <input type="number" name="growth_time_days" value="{{ old('growth_time_days', $plant->growth_time_days) }}" min="1" max="3650" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('description', $plant->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Imagen</label>
                <div class="flex items-center space-x-4">
                    @if($plant->image_path)
                        <img src="{{ asset('storage/' . $plant->image_path) }}" alt="{{ $plant->name }}" class="h-16 w-16 rounded object-cover">
                    @else
                        <div class="h-16 w-16 rounded bg-gray-100 flex items-center justify-center text-gray-400">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="mt-1 block w-full">
                </div>
                <p class="text-xs text-gray-500 mt-1">Dejar vacío para mantener la imagen actual.</p>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    <i class="fas fa-save mr-2"></i> Actualizar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
