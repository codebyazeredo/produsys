<div id="modalCreate" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Nova Categoria</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nome da categoria" class="w-full border p-2 rounded mb-4" required>
            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('modalCreate')" class="bg-gray-400 px-4 py-2 rounded">Cancelar</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
</div>
