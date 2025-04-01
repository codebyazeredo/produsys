<div id="modalDelete" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Excluir Fornecedor</h2>

        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')

            <p class="mb-4">Tem certeza de que deseja excluir este fornecedor?</p>

            <div class="flex justify-end gap-4">
                <button type="button" onclick="closeModal('modalDelete')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Excluir</button>
            </div>
        </form>
    </div>
</div>
