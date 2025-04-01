@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Gerenciar Estoque</h1>

            <div class="mb-4 flex justify-end">
                <a href="{{ route('stock.pending') }}" class="bg-orange-500 text-white hover:bg-orange-600 px-4 py-2 rounded">
                    Produtos sem Estoque
                </a>
            </div>

            <form action="{{ route('stock.index') }}" method="GET" class="mb-4">
                <div class="flex gap-4">
                    <div class="w-1/3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                        <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-2" value="{{ request('name') }}" placeholder="Filtrar por nome">
                    </div>
                    <div class="w-1/3">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded mt-2">
                            <option value="">Filtrar por categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/3">
                        <label for="supplier_id" class="block text-sm font-medium text-gray-700">Fornecedor</label>
                        <select id="supplier_id" name="supplier_id" class="w-full p-2 border border-gray-300 rounded mt-2">
                            <option value="">Filtrar por fornecedor</option>
                            @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}" {{ request('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Filtrar</button>
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left">Produto</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Categoria</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Quantidade em Estoque</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Última Movimentação</th>
{{--                        <th class="border border-gray-300 px-4 py-2 text-left">Ações</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @if(optional($product->balance)->position_id) <!-- Apenas exibe se tiver posição -->
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $product->category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ optional($product->balance)->quantity ?? 0 }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                @if($product->latestStockMovement)
                                    @php
                                        $movement = $product->latestStockMovement;
                                        $formattedDate = \Carbon\Carbon::parse($movement->movement_date)->format('d/m/Y H:i:s');
                                        $movementType = $movement->movement_type === 'add' ? 'Adicionado' : 'Removido';
                                        $userName = $movement->user ? $movement->user->name : 'Usuário desconhecido';
                                    @endphp
                                    {{ $movementType }} - {{ $movement->quantity }} - Data: {{ $formattedDate }} - Usuário: {{ $userName }}
                                @else
                                    Ainda não possui movimentos
                                @endif
                            </td>
{{--                            <td class="border border-gray-300 px-4 py-2">--}}
{{--                                <div class="flex justify-center gap-2">--}}
{{--                                    <a href="{{ route('stock.create', ['product_id' => $product->id]) }}" class="bg-green-500 text-white hover:bg-green-600 px-4 py-2 rounded">--}}
{{--                                        Adicionar Estoque--}}
{{--                                    </a>--}}
{{--                                    @if($product->latestStockMovement)--}}
{{--                                        <a href="{{ route('stock.edit', $product->latestStockMovement->id) }}" class="bg-yellow-500 text-white hover:bg-yellow-600 px-4 py-2 rounded">--}}
{{--                                            Editar Última Movimentação--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </td>--}}
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
