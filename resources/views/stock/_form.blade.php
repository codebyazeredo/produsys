<div class="bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-700">{{ isset($stockMovement) ? 'Editar Movimentação' : 'Registrar Movimentação' }}</h1>

    <form action="{{ isset($stockMovement) ? route('stock.update', $stockMovement->id) : route('stock.store') }}" method="POST">
        @csrf
        @if(isset($stockMovement))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="product_id" class="block text-sm font-medium text-gray-700">Produto</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded mt-2" value="{{ $product->name }}" disabled>
        </div>

        <div class="mb-4">
            <label for="warehouse_id" class="block text-sm font-medium text-gray-700">Armazém</label>
            <select name="warehouse_id" id="warehouse_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                <option value="">Selecione um armazém</option>
                @foreach($warehouses as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="position_id" class="block text-sm font-medium text-gray-700">Posição</label>
            <select name="position_id" id="position_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                <option value="">Selecione uma posição</option>
                <!-- As posições serão carregadas dinamicamente aqui -->
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantidade</label>
            <input type="number" name="quantity" id="quantity" class="w-full p-2 border border-gray-300 rounded mt-2" min="1" value="{{ old('quantity') }}" required>
        </div>

        <div class="mb-4">
            <label for="movement_type" class="block text-sm font-medium text-gray-700">Tipo de Movimentação</label>
            <select name="movement_type" id="movement_type" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                <option value="add" {{ old('movement_type') == 'add' ? 'selected' : '' }}>Adicionar</option>
                <option value="remove" {{ old('movement_type') == 'remove' ? 'selected' : '' }}>Remover</option>
            </select>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('stock.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                {{ isset($stockMovement) ? 'Atualizar' : 'Registrar' }}
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('warehouse_id').addEventListener('change', function() {
        const warehouseId = this.value;
        const positionSelect = document.getElementById('position_id');
        positionSelect.innerHTML = '<option value="">Selecione uma posição</option>';

        if (warehouseId) {
            fetch(`/positions-by-warehouse/${warehouseId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.positions.length > 0) {
                        data.positions.forEach(position => {
                            const option = document.createElement('option');
                            option.value = position.id;
                            option.textContent = position.name;
                            positionSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement('option');
                        option.value = '';
                        option.textContent = 'Nenhuma posição encontrada';
                        positionSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error('Erro ao carregar as posições:', error);
                });
        }
    });
</script>

