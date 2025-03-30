<div id="modalCreate" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Novo Produto</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="name" name="name" class="w-full p-2 border border-gray-300 rounded mt-2" required>
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                <select id="category_id" name="category_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="supplier_id" class="block text-sm font-medium text-gray-700">Fornecedor</label>
                <select id="supplier_id" name="supplier_id" class="w-full p-2 border border-gray-300 rounded mt-2" required>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Preço</label>
                <input type="number" step="0.01" id="price" name="price" class="w-full p-2 border border-gray-300 rounded mt-2" required>
            </div>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeModal('modalCreate')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>
