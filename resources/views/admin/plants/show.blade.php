@extends('layouts.app')

@section('title', $plant->name)

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold text-gray-800">{{ $plant->name }}</h1>
    <div>
        <a href="{{ route('admin.plants.edit', $plant) }}" class="text-blue-600 hover:text-blue-800 mr-4"><i class="fas fa-edit"></i> Editar</a>
        <a href="{{ route('admin.plants.index') }}" class="text-gray-600 hover:text-gray-800">Volver</a>
    </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="md:w-1/3">
                @if($plant->image_url)
                    <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="w-full rounded object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 rounded flex items-center justify-center text-gray-500">
                        <i class="fas fa-leaf text-3xl"></i>
                    </div>
                @endif
            </div>
            <div class="md:w-2/3">
                <p class="text-gray-700 mb-4 whitespace-pre-line">{{ $plant->description }}</p>
                <p class="text-gray-700"><span class="font-medium">Tiempo de crecimiento:</span> {{ $plant->growth_time }} días</p>
            </div>
        </div>
    </div>
@endsection


