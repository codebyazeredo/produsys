@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-gray-800 shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Gerenciamento de Categorias</h1>

            <div class="mb-4 flex justify-start">
                <a href="{{ route('categories.create') }}" class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded flex items-center gap-2">
                    <i class="bi bi-plus-lg"></i> Nova Categoria
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 w-16 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 flex-1 text-left">Nome</th>
                        <th class="border border-gray-300 px-4 py-2 w-24 text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2 w-16">{{ $category->id }}</td>
                            <td class="border border-gray-300 px-4 py-2 flex-1">{{ $category->name }}</td>
                            <td class="border border-gray-300 px-4 py-2 w-24 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="bi bi-pencil-square text-xl"></i>
                                    </a>

                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="bi bi-trash text-xl"></i>
                                        </button>
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
