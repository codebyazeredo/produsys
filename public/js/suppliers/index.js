function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function openEditModal(id, name, cnpj, phone, address) {
    const modal = document.getElementById('modalCreate');
    document.getElementById('modalTitle').textContent = 'Editar Fornecedor';
    document.getElementById('supplierForm').action = `/suppliers/${id}`;
    document.getElementById('supplierForm').method = 'POST';

    const inputMethod = document.createElement('input');
    inputMethod.setAttribute('name', '_method');
    inputMethod.setAttribute('value', 'PUT');
    inputMethod.setAttribute('type', 'hidden');
    document.getElementById('supplierForm').appendChild(inputMethod);

    document.getElementById('name').value = name;
    document.getElementById('cnpj').value = cnpj;
    document.getElementById('phone').value = phone;
    document.getElementById('address').value = address;

    const submitButton = document.getElementById('submitButton');
    submitButton.textContent = 'Atualizar';
    submitButton.classList.remove('bg-blue-500');
    submitButton.classList.add('bg-yellow-500');

    openModal('modalCreate');
}

function openDeleteModal(supplierId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = '/suppliers/' + supplierId;

    document.getElementById('modalDelete').classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
