function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function openEditModal(id, name, categoryId, supplierId, price, quantity) {
    document.getElementById('editForm').action = '/products/' + id;
    document.getElementById('editName').value = name;
    document.getElementById('editCategory_id').value = categoryId;
    document.getElementById('editSupplier_id').value = supplierId;
    document.getElementById('editPrice').value = price;
    document.getElementById('editQuantity').value = quantity;

    openModal('modalEdit');
}

function openDeleteModal(id) {
    document.getElementById('deleteForm').action = '/products/' + id;
    openModal('modalDelete');
}

function confirmDelete() {
    document.getElementById('deleteForm').submit();
}

window.addEventListener('click', function(event) {
    if (event.target.classList.contains('fixed') || event.target.classList.contains('bg-opacity-50')) {
        closeModal('modalCreate');
        closeModal('modalEdit');
        closeModal('modalDelete');
    }
});
