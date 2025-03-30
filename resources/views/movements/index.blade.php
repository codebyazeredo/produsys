@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Histórico de Movimentações</h1>

            <form action="{{ route('stock.history') }}" method="GET" class="mb-4">
                <div class="flex gap-4">
                    <div class="w-1/3">
                        <label for="product_id" class="block text-sm font-medium text-gray-700">Produto</label>
                        <select id="product_id" name="product_id" class="w-full p-2 border border-gray-300 rounded mt-2">
                            <option value="">Filtrar por produto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ request('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
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
                        <th class="border border-gray-300 px-4 py-2 text-left">Tipo</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Quantidade</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Data</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Usuario</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stockMovements as $movement)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <span class="{{ $movement->movement_type === 'add' ? 'text-green-600 font-semibold' : 'text-red-600 font-semibold' }}">
                                    {{ $movement->movement_type === 'add' ? 'Entrada' : 'Saída' }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($movement->movement_date)->format('d/m/Y H:i:s') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->user ? $movement->user->name : 'Usuário desconhecido' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
