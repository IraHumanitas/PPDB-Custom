@extends('layout.layout')

@section('space-work')

<div class="container mt-4">
    <form action="{{ route('kompetensiKeahlianSimpan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_program" class="font-bold">Nama Kompetensi Keahlian:</label>
            <input type="text" name="nama_program" class="form-control" required>
            @error('nama_program')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="singkatan" class="font-bold">Singkatan:</label>
            <input type="text" name="singkatan" class="form-control" required>
            @error('singkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi" class="font-bold">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control"></textarea>
            @error('deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="pelajaran" class="font-bold">Pelajarannya Apa?</label>
            <textarea name="pelajaran" class="form-control"></textarea>
            @error('pelajaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="program" class="font-bold">Program Pembelajaran</label>
            <textarea name="program" class="form-control"></textarea>
            @error('program')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kuota" class="font-bold">Kuota Pendaftaran:</label>
            <input type="text" name="kuota" class="form-control" required>
            @error('kuota')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="foto" class="font-bold">Foto:</label>
            <input type="file" name="foto" class="form-control-file">
            @error('foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambahkan Jurusan</button>
    </form>
</div>

@endsection
