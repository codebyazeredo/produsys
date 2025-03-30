<div id="modalDelete" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Tem certeza?</h2>
        <p class="mb-4">Essa ação não pode ser desfeita.</p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('modalDelete')" class="bg-gray-400 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Excluir</button>
            </div>
        </form>
    </div>
</div>
