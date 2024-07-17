@extends('layout.layout')

@section('space-work')
    <h2>Edit Jurusan</h2>

    <form method="POST" action="{{ route('updateJurusan', ['idjurusan' => $jurusan->id]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Jurusan</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $jurusan->nama }}">
        </div>
        @error('nama')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="singkatan">Singkatan Jurusan</label>
            <input type="text" class="form-control" id="singkatan" name="singkatan" value="{{ $jurusan->singkatan }}">
        </div>
        @error('singkatan')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="id_kompetensi">Pilih Program Keahlian:</label>
        <select name="id_kompetensi" required>
            @foreach($kompetensi as $program)
                <option value="{{ $program->id_keahlian }}">{{ $program->nama_program }}</option>
            @endforeach
        </select>
        @error('id_kompetensi')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <br><br>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Jurusan</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">
                {{ $jurusan->deskripsi }}
            </textarea>
        </div>
        @error('deskripsi')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="foto">Foto Jurusan</label>
            @if ($jurusan->foto)
                <img src="{{ asset('gambar/jurusan/foto/' . $jurusan->foto) }}" alt="{{ $jurusan->nama }}" class="img-thumbnail">
            @else
                <p>Tidak ada gambar yang sudah diunggah.</p>
            @endif
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        @error('foto')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="logo">Logo Jurusan</label>
            @if ($jurusan->logo)
                <img src="{{ asset('gambar/jurusan/logo/' . $jurusan->logo) }}" alt="{{ $jurusan->nama }}" class="img-thumbnail">
            @else
                <p>Tidak ada gambar yang sudah diunggah.</p>
            @endif

            <input type="file" class="form-control" id="logo" name="logo">
        </div>
        @error('logo')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <br><br>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
