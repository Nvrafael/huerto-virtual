@extends('layouts.app')

@section('title', 'Crear Planta')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Nueva Planta</h1>
        <a href="{{ route('admin.plants.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-1"></i> Volver
        </a>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('admin.plants.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tiempo de crecimiento (días)</label>
                <input type="number" name="growth_time_days" value="{{ old('growth_time_days') }}" min="1" max="3650" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" name="image" accept="image/*" class="mt-1 block w-full">
                <p class="text-xs text-gray-500 mt-1">Formatos permitidos: JPG, PNG, WEBP. Máx 2MB.</p>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    <i class="fas fa-save mr-2"></i> Guardar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
