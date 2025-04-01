@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Gerenciamento de Unidades de Medida</h1>

            <div class="mb-4 flex justify-start">
                <a href="{{ route('unit_measures.create') }}" class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded flex items-center gap-2">
                    <i class="bi bi-plus-lg"></i> Nova Unidade de Medida
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="border border-gray-300 px-4 py-2 w-16 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Nome</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Abreviação</th>
                        <th class="border border-gray-300 px-4 py-2 w-24 text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($unitMeasures as $unitMeasure)
                        <tr class="border border-gray-300 text-gray-800 hover:bg-gray-800 hover:text-white">
                            <td class="border border-gray-300 px-4 py-2 w-16">{{ $unitMeasure->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $unitMeasure->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $unitMeasure->abbreviation }}</td>
                            <td class="border border-gray-300 px-4 py-2 w-24 text-center">
                                <a href="{{ route('unit_measures.edit', $unitMeasure->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="bi bi-pencil-square text-xl"></i>
                                </a>

                                <form action="{{ route('unit_measures.destroy', $unitMeasure->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="bi bi-trash text-xl"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/unit_measures/index.js') }}"></script>
@endsection
