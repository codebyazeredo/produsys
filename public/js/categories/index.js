function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}
function openEditModal(id, name) {
    document.getElementById('editName').value = name;
    document.getElementById('editForm').action = `/categories/${id}`;
    openModal('modalEdit');
}
function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/categories/${id}`;
    openModal('modalDelete');
}
