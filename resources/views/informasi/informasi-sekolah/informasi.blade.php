@extends('layout/layout')

@section('space-work')

    <h2 class="mb-4">Infromasi Mengenai Sekolah</h2>

    <a href="{{ route('createInformasiSekolah') }}" class="btn btn-md btn-primary">Tambah Informasi Sekolah</a>
   
    <br> <br>

    <form action="{{ route('informasiSekolah.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari informasi...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>


    <br> <br>

    <table class="table">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Slider</th>
            <th>Aksi</th>
        </tr>
        @foreach ($informasi as $info)
            <tr>
                <td>{{ $info->id }}</td>
                <td>
                    <img src="{{ asset('gambar/informasi') }}/{{ $info->foto }}" alt="{{ $info->judul }}">
                </td>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->deskripsi }}</td>
                <td>{{ $info->slider_pesan }}</td>
                <td>
                    <form action="/admin/informasi/sekolah/delete/{{ $info->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button danger" class="hapus" onclick="confirmDelete('{{ $info->judul }}')">Hapus</button>
                    </form>
                </td>
                <td>
                    <button>
                        <a href="/admin/informasi/sekolah/edit/{{ $info->id }}">Edit</a>
                    </button>
                </td>
            </tr>
        @endforeach

    </table>

    <div id="deleteConfirmation" class="confirmation-message">
        <p>Anda yakin ingin menghapus pengguna ini?</p>
        <button onclick="deleteUser()">Ya, Hapus</button>
        <button onclick="cancelDelete()">Batal</button>
    </div>

@endsection

<script src="{{ asset('js/informasi.js') }}"></script>

    