@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Histórico de Movimentações de Estoque</h1>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left">Produto</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Data</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Tipo de Movimentação</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Quantidade</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Usuário</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movements as $movement)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->product->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($movement->movement_date)->format('d/m/Y H:i:s') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $movement->movement_type == 'add' ? 'Adição' : 'Remoção' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->quantity }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $movement->user ? $movement->user->name : 'Usuário desconhecido' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('stock.index') }}" class="bg-gray-500 text-white hover:bg-gray-600 px-4 py-2 rounded">
                    Voltar ao Estoque
                </a>
            </div>
        </div>
    </div>
@endsection
