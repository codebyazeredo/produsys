function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
}

function openEditModal(id, name, contact_info) {
    document.getElementById('editName').value = name;
    document.getElementById('editContact').value = contact_info;
    document.getElementById('editForm').action = `/suppliers/${id}`;
    openModal('modalEdit');
}

function openDeleteModal(id) {
    document.getElementById('deleteForm').action = `/suppliers/${id}`;
    openModal('modalDelete');
}
