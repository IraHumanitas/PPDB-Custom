function confirmDelete(userName) {
    const confirmationMessage = document.getElementById('deleteConfirmation');
    confirmationMessage.style.display = 'block';
}

function deleteUser() {
    document.querySelector('form').submit();
}

function cancelDelete() {
    const confirmationMessage = document.getElementById('deleteConfirmation');
    confirmationMessage.style.display = 'none';
}