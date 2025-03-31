@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-700">Criar Armazém</h1>

            <form action="{{ route('warehouses.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Armazém</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-2" required placeholder="Nome do Armazém">
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Localização</label>
                    <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded mt-2" required placeholder="Localização do Armazém">
                </div>

                <h2 class="text-xl font-bold mb-4 text-gray-700">Criar Posições</h2>
                <div id="positions-container">
                    <div class="flex items-center mb-2">
                        <input type="text" name="positions[]" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Nome da Posição" required>
                        <button type="button" class="ml-2 bg-red-500 text-white px-2 py-1 rounded" onclick="removePosition(this)">Remover</button>
                    </div>
                </div>
                <button type="button" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="addPosition()">Adicionar Posição</button>

                <div class="mt-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Criar Armazém</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function addPosition() {
            const container = document.getElementById('positions-container');
            const positionDiv = document.createElement('div');
            positionDiv.className = 'flex items-center mb-2';
            positionDiv.innerHTML = `
                <input type="text" name="positions[]" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Nome da Posição" required>
                <button type="button" class="ml-2 bg-red-500 text-white px-2 py-1 rounded" onclick="removePosition(this)">Remover</button>
            `;
            container.appendChild(positionDiv);
        }

        function removePosition(button) {
            button.parentElement.remove();
        }
    </script>
@endsection
