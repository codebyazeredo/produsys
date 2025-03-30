<div class="bg-white shadow-md rounded-lg p-4">
<h3 class="text-gray-800 text-lg font-semibold mb-4">Ações Rápidas</h3>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
        <a href="{{ route('products.index') }}" class="flex items-center justify-center gap-2 text-white bg-indigo-500 hover:bg-indigo-600 py-2 px-3 text-xs font-medium rounded-md shadow-md transition-all duration-300 transform hover:scale-105 min-w-[120px]">
            <i class="bi bi-box-seam text-base"></i> Produto
        </a>
        <a href="{{ route('stock.index') }}" class="flex items-center justify-center gap-2 text-white bg-emerald-500 hover:bg-emerald-600 py-2 px-3 text-xs font-medium rounded-md shadow-md transition-all duration-300 transform hover:scale-105 min-w-[120px]">
            <i class="bi bi-boxes text-base"></i> Estoque
        </a>
        <a href="{{ route('stock.history') }}" class="flex items-center justify-center gap-2 text-white bg-orange-500 hover:bg-orange-600 py-2 px-3 text-xs font-medium rounded-md shadow-md transition-all duration-300 transform hover:scale-105 min-w-[120px]">
            <i class="bi bi-arrow-left-right text-base"></i> Movimentações
        </a>
        <a href="#" class="flex items-center justify-center gap-2 text-white bg-blue-500 hover:bg-blue-600 py-2 px-3 text-xs font-medium rounded-md shadow-md transition-all duration-300 transform hover:scale-105 min-w-[120px]">
            <i class="bi bi-person-plus text-base"></i> Usuário
        </a>
    </div>
</div>
