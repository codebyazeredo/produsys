@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-gray-800 shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Editar Categoria</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('categories._form')
                <button type="submit" class="bg-blue-600 hover:bg-blue-400 text-white px-4 py-2 rounded mt-4">Atualizar</button>
            </form>
        </div>
    </div>
@endsection
