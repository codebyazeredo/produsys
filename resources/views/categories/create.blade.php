@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-gray-800 shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Criar Categoria</h1>

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                @include('categories._form')
                <button type="submit" class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded mt-4">Salvar</button>
            </form>
        </div>
    </div>
@endsection
