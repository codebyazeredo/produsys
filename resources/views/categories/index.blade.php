@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Gerenciamento de Categorias</h1>

            <div class="mb-4">
                <button onclick="openModal('modalCreate')" class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded flex items-center gap-2">
                    <i class="bi bi-plus-lg"></i> Nova Categoria
                </button>
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
                                    <button onclick="openEditModal({{ $category->id }}, '{{ $category->name }}')" class="text-blue-500 hover:text-blue-700">
                                        <i class="bi bi-pencil-square text-xl"></i>
                                    </button>

                                    <button onclick="openDeleteModal({{ $category->id }})" class="text-red-500 hover:text-red-700">
                                        <i class="bi bi-trash text-xl"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('categories.create-modal')
    @include('categories.edit-modal')
    @include('components.delete-modal')

    <script src="{{ asset('js/categories/index.js') }}"></script>
@endsection
