@extends('layouts.app')

@section('title', 'Editar planta')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Editar planta</h1>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.plants.update', $plant) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.plants._form', ['submitLabel' => 'Actualizar'])
    </form>
</div>
@endsection


