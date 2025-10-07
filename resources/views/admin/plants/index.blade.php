@extends('layouts.app')

@section('title', 'Plantas - Administración')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Catálogo de Plantas</h1>
        <a href="{{ route('admin.plants.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            <i class="fas fa-plus mr-2"></i> Nueva Planta
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagen</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiempo de crecimiento</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($plants as $plant)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($plant->image_path)
                                <img src="{{ asset('storage/' . $plant->image_path) }}" alt="{{ $plant->name }}" class="h-12 w-12 rounded object-cover">
                            @else
                                <div class="h-12 w-12 rounded bg-gray-100 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $plant->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $plant->growth_time_days }} días</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('admin.plants.show', $plant) }}" class="text-gray-600 hover:text-gray-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.plants.edit', $plant) }}" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.plants.destroy', $plant) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta planta?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">No hay plantas registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="px-6 py-4">{{ $plants->links() }}</div>
    </div>
</div>
@endsection
