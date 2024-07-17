function confirmDelete(userName) {
    const confirmationMessage = document.getElementById('deleteConfirmation');
    confirmationMessage.style.display = 'block';
    // Tambahkan logika lain seperti menampilkan pesan yang menarik di sini
}

function deleteUser() {
    // Lakukan penghapusan pengguna
    document.querySelector('form').submit();
}

function cancelDelete() {
    const confirmationMessage = document.getElementById('deleteConfirmation');
    confirmationMessage.style.display = 'none';
}