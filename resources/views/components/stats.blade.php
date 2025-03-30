<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-white shadow-md rounded-lg p-4">
        <h3 class="text-gray-700 text-lg font-semibold">Quantidade em Estoque</h3>
        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalStock, 0, ',', '.') }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">
        <h3 class="text-gray-700 text-lg font-semibold">Valor Total do Estoque</h3>
        <p class="text-2xl font-bold text-gray-900">R$ {{ number_format($totalStockValue, 2, ',', '.') }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">
        <h3 class="text-gray-700 text-lg font-semibold">Produtos Cadastrados</h3>
        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalProducts, 0, ',', '.') }}</p>
    </div>

    <div class="bg-white shadow-md rounded-lg p-4">
        <h3 class="text-gray-700 text-lg font-semibold">Fornecedores Cadastrados</h3>
        <p class="text-2xl font-bold text-gray-900">{{ number_format($totalSuppliers, 0, ',', '.') }}</p>
    </div>
</div>
