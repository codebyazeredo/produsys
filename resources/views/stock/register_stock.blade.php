@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Registrar Estoque para o Produto: {{ $product->name }}</h1>

            <form action="{{ route('stock.storeRegisteredStock') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="mb-4">
                    <label for="warehouse_id" class="block text-sm font-medium text-gray-700">Armazém</label>
                    <select name="warehouse_id" id="warehouse_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                        <option value="">Selecione um armazém</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="position_id" class="block text-sm font-medium text-gray-700">Posição</label>
                    <select name="position_id" id="position_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                        <option value="">Selecione uma posição</option>
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade</label>
                    <input type="number" name="quantity" id="quantity" class="w-full p-2 border border-gray-300 rounded mt-2" min="1" required>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Registrar Estoque
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
