@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Nova Movimentação de Estoque</h1>

            <form action="{{ route('stock.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">Produto</label>
                    <select id="product_id" name="product_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade</label>
                    <input type="number" id="quantity" name="quantity" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="type" name="type" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                        <option value="add">Adicionar</option>
                        <option value="remove">Remover</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                    <textarea id="description" name="description" class="w-full p-2 border border-gray-300 rounded mt-2"></textarea>
                </div>

                <div class="flex justify-end gap-4">
                    <button type="button" onclick="closeModal('modalCreate')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
