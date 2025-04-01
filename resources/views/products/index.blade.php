@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Gerenciamento de Produtos</h1>

            <div class="mb-4 flex justify-start">
                <a href="{{ route('products.create') }}"
                   class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded flex items-center gap-2">
                    <i class="bi bi-plus-lg"></i> Novo Produto
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nome</th>
                        <th class="border border-gray-300 px-4 py-2">Categoria</th>
                        <th class="border border-gray-300 px-4 py-2">Fornecedor</th>
                        <th class="border border-gray-300 px-4 py-2">Preço</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $product->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->supplier->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('products.edit', $product->id) }}"
                                   class="text-blue-500 hover:text-blue-700">
                                    <i class="bi bi-pencil-square text-xl"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="bi bi-trash text-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Produto/index.js') }}"></script>
@endsection
