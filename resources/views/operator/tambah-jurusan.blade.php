@extends('layout/layout')

@section('space-work')

<form action="{{ route('jurusansimpan') }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf

    <!-- Field Nama -->
    <div class="form-group">
        <label for="nama" class="font-bold">Nama Jurusan:</label>
        <input type="text" name="nama" class="form-control" required>
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <!-- Field Singkatan -->
    <div class="form-group">
        <label for="singkatan" class="font-bold">Singkatan:</label>
        <input type="text" name="singkatan" class="form-control" required>
        @error('singkatan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <!-- Field Logo -->
    <div class="form-group">
        <label for="logo" class="font-bold">Logo:</label>
        <input type="file" name="logo" class="form-control-file">
        @error('logo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <div class="form-group">
        <label for="foto" class="font-bold">Foto:</label>
        <input type="file" name="foto" class="form-control-file">
        @error('foto')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <div class="form-group">
        <label for="deskripsi" class="font-bold">Deskripsi:</label>
        <textarea name="deskripsi" class="form-control"></textarea>
        @error('deskripsi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <!-- Field Pilihan Program Keahlian -->
    <div class="form-group">
        <label for="id_kompetensi" class="font-bold">Pilih Program Keahlian:</label>
        <select name="id_kompetensi" class="form-control" required>
            @foreach($kompetensi as $kompetensi)
                <option value="{{ $kompetensi->id_keahlian }}">{{ $kompetensi->nama_program }}</option>
            @endforeach
        </select>
        @error('id_kompetensi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Tambahkan Jurusan</button>
</form>

@endsection
