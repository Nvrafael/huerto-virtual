@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="name" value="{{ old('name', $plant->name ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Tiempo de crecimiento (días)</label>
        <input type="number" name="growth_time" min="0" value="{{ old('growth_time', $plant->growth_time ?? 0) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
    </div>
    
    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $plant->description ?? '') }}</textarea>
    </div>

    <div class="md:col-span-2">
        <label class="block text-sm font-medium text-gray-700">Imagen</label>
        <input type="file" name="image" accept="image/*" class="mt-1 block w-full">

        @if(!empty($plant) && $plant->image_url)
            <div class="mt-2">
                <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="h-24 w-24 object-cover rounded">
            </div>
        @endif
    </div>
</div>

<div class="mt-6">
    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
        {{ $submitLabel }}
    </button>
    <a href="{{ route('admin.plants.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancelar</a>
    </div>


