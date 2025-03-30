<aside class="bg-gray-600 text-white w-64 min-h-screen">
    <div class="p-5">
        <h2 class="text-2xl font-semibold">Bem-vindo(a),</h2>
        <span>{{ Auth::user()->name }}</span>
    </div>

    <ul class="space-y-2">
        <li>
            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">
                <i class="bi bi-speedometer2 mr-2"></i> Dashboard
            </a>
        </li>

        <li x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">
                <span><i class="bi bi-box-seam mr-2"></i> Produtos</span>
                <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
            </button>
            <ul x-show="open" class="pl-6 space-y-1">
                <li>
                    <a href="{{ route('products.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">Gerenciar Produtos</a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">Gerenciar Categorias</a>
                </li>
                <li>
                    <a href="{{ route('suppliers.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">Gerenciar Fornecedores</a>
                </li>
            </ul>
        </li>

        <li x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center justify-between w-full px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">
                <span><i class="bi bi-boxes mr-2"></i> Estoque</span>
                <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
            </button>
            <ul x-show="open" class="pl-6 space-y-1">
                <li>
                    <a href="{{ route('stock.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">Gerenciar Estoque</a>
                </li>
                <li>
                    <a href="{{ route('stock.history') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">Histórico das Movimentações</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white transition duration-200">
                <i class="bi bi-people mr-2"></i> Usuários
            </a>
        </li>
    </ul>
</aside>
