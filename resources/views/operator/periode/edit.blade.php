@extends('layout/layout')

@section('space-work')

<div class="container mt-4">
    <h2>Edit Periode</h2>
    <form method="POST" action="{{ route('periode.update', $periode->id_periode) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ $periode->tahun }}">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_buka">Tanggal Buka:</label>
            <input type="date" class="form-control @error('tanggal_buka') is-invalid @enderror" id="tanggal_buka" name="tanggal_buka" value="{{ $periode->tanggal_buka }}">
            @error('tanggal_buka')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_tutup">Tanggal Tutup:</label>
            <input type="date" class="form-control @error('tanggal_tutup') is-invalid @enderror" id="tanggal_tutup" name="tanggal_tutup" value="{{ $periode->tanggal_tutup }}">
            @error('tanggal_tutup')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="aktif">Aktif:</label>
            <select class="form-control @error('aktif') is-invalid @enderror" id="aktif" name="aktif">
                <option value="Y" {{ $periode->aktif === 'Y' ? 'selected' : '' }}>Y</option>
                <option value="N" {{ $periode->aktif === 'N' ? 'selected' : '' }}>N</option>
            </select>
            @error('aktif')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection

<script>
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
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

