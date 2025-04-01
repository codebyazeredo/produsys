@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Produtos Pendentes</h1>
            <p class="mb-4 text-gray-600">Estes produtos ainda não possuem saldo nem posição.</p>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left">Produto</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('stock.registerStock', ['productId' => $product->id]) }}"
                                   class="bg-blue-500 text-white hover:bg-blue-600 px-4 py-2 rounded">
                                    Dar Entrada no Estoque
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
