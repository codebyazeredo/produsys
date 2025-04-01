@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Editar Fornecedor</h1>

            <div class="panel-body">
                <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('suppliers._form', ['supplier' => $supplier])
                    <div class="mt-4 flex justify-end gap-4">
                        <a href="{{ route('suppliers.index') }}" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-400 text-white px-4 py-2 rounded">
                            Atualizar Fornecedor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
