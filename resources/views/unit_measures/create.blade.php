@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Criar Nova Unidade de Medida</h1>

            <div class="panel-body">
                <form action="{{ route('unit_measures.store') }}" method="POST">
                    @csrf
                    @include('unit_measures._form')
                    <div class="mt-4 flex justify-end gap-4">
                        <a href="{{ route('unit_measures.index') }}" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                        <button type="submit" class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded">
                            Criar Unidade de Medida
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
