<div class="mb-4">
    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Armazém</label>
    <input type="text" id="name" name="name" class="w-full p-2 border text-gray-900 border-gray-300 rounded mt-2" required placeholder="Nome do Armazém" value="{{ old('name', $warehouse->name ?? '') }}">
</div>

<div class="mb-4">
    <label for="location" class="block text-sm font-medium text-gray-700">Localização</label>
    <input type="text" id="location" name="location" class="w-full p-2 border text-gray-900 border-gray-300 rounded mt-2" required placeholder="Localização do Armazém" value="{{ old('location', $warehouse->location ?? '') }}">
</div>

<h2 class="text-lg font-medium text-gray-700 mt-6">Criar Posições</h2>
<div id="positions-container">
    @foreach(old('positions', $warehouse->positions ?? []) as $position)
        <div class="flex items-center mb-2">
            <input type="text" name="positions[]" class="w-full p-2 border text-gray-900 border-gray-300 rounded mt-2" placeholder="Nome da Posição" value="{{ $position }}">
            <button type="button" class="ml-2 bg-red-500 text-white px-2 py-1 rounded" onclick="removePosition(this)">Remover</button>
        </div>
    @endforeach
</div>
<button type="button" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="addPosition()">Adicionar Posição</button>

<script>
    function addPosition() {
        const container = document.getElementById('positions-container');
        const positionDiv = document.createElement('div');
        positionDiv.className = 'flex items-center mb-2';
        positionDiv.innerHTML = `
            <input type="text" name="positions[]" class="w-full p-2 border text-gray-900 border-gray-300 rounded mt-2" placeholder="Nome da Posição" required>
            <button type="button" class="ml-2 bg-red-500 text-white px-2 py-1 rounded" onclick="removePosition(this)">Remover</button>
        `;
        container.appendChild(positionDiv);
    }

    function removePosition(button) {
        button.parentElement.remove();
    }
</script>
