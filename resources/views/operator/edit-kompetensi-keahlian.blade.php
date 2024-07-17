@extends('layout.layout')

@section('space-work')
    <h2>Edit Kompetensi keahlian</h2>

    <form method="POST" action="{{ route('kompetensiKeahlianUpdate', ['idkompetensikeahlian' => $kompetensi->id_keahlian]) }}" enctype="multipart/form-data">


        @csrf
        @method('PUT')

        <div class="form-group">
        <label for="nama_program">Nama Kompetensi Keahlian:</label>
            <input type="text" class="form-control" id="nama_program" name="nama_program" value="{{ $kompetensi->nama_program }}">
        </div>
        @error('nama_program')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            <label for="singkatan">Singkatan Kompetensi Keahlian</label>
            <input type="text" class="form-control" id="singkatan" name="singkatan" value="{{ $kompetensi->singkatan }}">
        </div>
        @error('singkatan')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Jurusan</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">
                {{ $kompetensi->deskripsi }}
            </textarea>
        </div>
        @error('deskripsi')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <label for="pelajaran">Pelajarannya Apa?</label>
        <textarea name="pelajaran"> 
            {{ $kompetensi->pelajaran }}
        </textarea>
        @error('pelajaran')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Tambah pelajaran -->
        <label for="program">Program Pembelajaran</label>
        <textarea name="program">
            {{ $kompetensi->program }}
        </textarea>
        @error('program')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <label for="kuota">Kuota Pendaftaran:</label>
        <input type="text" name="kuota" required value="{{ $kompetensi->kuota }}">
        @error('kuota')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        <br><br>

        <div class="form-group">
            <label for="foto">Foto Jurusan</label>
            @if ($kompetensi->foto)
                <img src="{{ asset('gambar/kompetensi-keahlian/foto/' . $kompetensi->foto) }}" alt="{{ $kompetensi->nama_program }}" class="img-thumbnail">
            @else
                <p>Tidak ada gambar yang sudah diunggah.</p>
            @endif
            <input type="file" name="foto">
        </div>
        @error('foto')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <br><br>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
@endsection
