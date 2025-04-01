@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Editar Produto</h1>

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
                @include('products._form', ['product' => $product])
                <button type="submit" class="bg-blue-600 hover:bg-blue-400 text-white px-4 py-2 rounded mt-4">
                    Atualizar Produto
                </button>
            </form>
        </div>
    </div>
@endsection
