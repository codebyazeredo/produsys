function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function openEditModal(id, name, abbreviation) {
    const modal = document.getElementById('modalCreate');
    document.getElementById('modalTitle').textContent = 'Editar Unidade de Medida';
    document.getElementById('unitMeasureForm').action = `/unitMeasures/${id}`;
    document.getElementById('unitMeasureForm').method = 'POST';

    const inputMethod = document.createElement('input');
    inputMethod.setAttribute('name', '_method');
    inputMethod.setAttribute('value', 'PUT');
    inputMethod.setAttribute('type', 'hidden');
    document.getElementById('unitMeasureForm').appendChild(inputMethod);

    // Preenche os campos do formulário
    document.getElementById('name').value = name;
    document.getElementById('abbreviation').value = abbreviation;

    const submitButton = document.getElementById('submitButton');
    submitButton.textContent = 'Atualizar';
    submitButton.classList.remove('bg-blue-500');
    submitButton.classList.add('bg-yellow-500');

    openModal('modalCreate');
}

function openDeleteModal(unitMeasureId) {
    const deleteForm = document.getElementById('deleteForm');
    deleteForm.action = '/unit-measures/' + unitMeasureId;

    document.getElementById('modalDelete').classList.remove('hidden');
}
