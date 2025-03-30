function openAddModal(productId) {
    document.getElementById('product_id_add').value = productId;
    document.getElementById('add-modal').classList.remove('hidden');
}

function openRemoveModal(productId) {
    document.getElementById('product_id_remove').value = productId;
    document.getElementById('remove-modal').classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
