@extends('layouts.app')

@section('title', 'Nueva planta')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-6">Nueva planta</h1>

<div class="bg-white shadow rounded-lg p-6">
    <form action="{{ route('admin.plants.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.plants._form', ['submitLabel' => 'Crear'])
    </form>
</div>
@endsection


