<div class="bg-white shadow-md rounded-lg p-4">
    <h3 class="text-gray-700 text-lg font-semibold mb-4">Produtos com Estoque Baixo</h3>
    <div class="overflow-x-auto">
        @if ($produtosComEstoqueBaixo->isEmpty())
            <p class="text-center text-gray-700">Nenhum produto com estoque baixo no momento</p>
        @else
            <table class="w-full border-collapse">
                <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="px-4 py-2 text-left">Produto</th>
                    <th class="px-4 py-2 text-right">Quantidade Atual</th>
                    <th class="px-4 py-2 text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($produtosComEstoqueBaixo as $produto)
                    <tr class="border-t bg-red-100 hover:bg-red-200">
                        <td class="px-4 py-2">
                            {{ $produto->name }}
                            <span class="text-red-600 font-semibold"> (Estoque baixo!)</span>
                        </td>
                        <td class="px-4 py-2 text-right">
                            {{ $produto->balance->quantity ?? 0 }}
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 transition">
                                Solicitar
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
