@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Gerenciar Armazéns</h1>

            <div class="mb-4">
                <a href="{{ route('warehouses.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Criar Novo Armazém</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 text-left">Nome do Armazém</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Localização</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Posições</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($warehouses as $warehouse)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2">{{ $warehouse->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $warehouse->location }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <ul>
                                    @foreach($warehouse->positions as $position)
                                        <li>{{ $position->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('warehouses.edit', $warehouse) }}" class="bg-yellow-500 text-white hover:bg-yellow-600 px-2 py-1 rounded">Editar</a>
                                    <form action="{{ route('warehouses.destroy', $warehouse) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este armazém?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white hover:bg-red-600 px-2 py-1 rounded">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
