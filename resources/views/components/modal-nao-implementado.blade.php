<div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" x-cloak>
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm text-center">
        <h2 class="text-2xl font-bold text-red-600 mb-2">Desculpe</h2>
        <h3 class="text-xl font-semibold mb-4">Funcionalidade em breve</h3>
        <p class="text-gray-600">Esta funcionalidade será implementada em atualizações futuras.</p>
        <button @click="open = false" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
            Fechar
        </button>
    </div>
</div>
