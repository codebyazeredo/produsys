@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Editar Armazém</h1>

            <div class="panel-body">
                <form action="{{ route('warehouses.update', $warehouse) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('warehouses._form')
                    <div class="mt-4 flex justify-end gap-4">
                        <a href="{{ route('warehouses.index') }}" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-400 text-white px-4 py-2 rounded">
                            Atualizar Armazém
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
