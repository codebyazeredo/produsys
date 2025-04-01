<div class="mb-4">
    <label class="block text-gray-700">Nome:</label>
    <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="mb-4">
    <label class="block text-gray-700">Categoria:</label>
    <select name="category_id" class="w-full border p-2 rounded" required>
        <option value="">Selecione...</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <label class="block text-gray-700">Fornecedor:</label>
    <select name="supplier_id" class="w-full border p-2 rounded" required>
        <option value="">Selecione...</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}" {{ (old('supplier_id', $product->supplier_id ?? '') == $supplier->id) ? 'selected' : '' }}>
                {{ $supplier->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4 flex space-x-4">
    <div class="w-3/4">
        <label class="block text-gray-700">Preço:</label>
        <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <div class="w-1/4">
        <label class="block text-gray-700">Unidade de Medida:</label>
        <select name="unit_measure_id" class="w-full border p-2 rounded" required>
            <option value="">Selecione...</option>
            @foreach($unitMeasures as $unitMeasure)
                <option value="{{ $unitMeasure->id }}" {{ (old('unit_measure_id', $product->unit_measure_id ?? '') == $unitMeasure->id) ? 'selected' : '' }}>
                    {{ $unitMeasure->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
