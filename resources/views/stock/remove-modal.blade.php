<div id="remove-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded-lg">
        <h2 class="text-xl font-bold mb-4">Remover Estoque</h2>

        <form action="{{ route('stock.store') }}" method="POST">
            @csrf
            <input type="hidden" name="movement_type" value="remove">
            <input type="hidden" id="product_id_remove" name="product_id">

            <div class="mb-4">
                <label for="quantity_remove" class="block text-sm font-medium text-gray-700">Quantidade</label>
                <input type="number" id="quantity_remove" name="quantity" class="w-full p-2 border border-gray-300 rounded mt-2" required min="1">
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('remove-modal')" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Confirmar</button>
            </div>
        </form>
    </div>
</div>
