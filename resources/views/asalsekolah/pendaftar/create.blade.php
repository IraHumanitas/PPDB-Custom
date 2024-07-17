@extends('layout/layout')

@section('space-work')
    <div class="container mt-4">
        <h1 class="text-2xl font-bold mb-4">Tambah User Baru</h1>

        <form method="POST" action="{{ route('pendaftar.store') }}" class="max-w-md mx-auto">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" placeholder="Nama" class="form-control" required>
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" id="nisn" placeholder="NISN" class="form-control" required>
                @error('nisn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="NIK" class="form-control" required>
                @error('nik')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

           

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
