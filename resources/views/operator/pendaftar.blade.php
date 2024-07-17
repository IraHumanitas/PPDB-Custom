@extends('layout.layout')

@section('space-work')
    <h2 class="text-2xl font-bold mb-4">data Akun Pendaftar</h2>

    <a href="{{ route('pendaftar.store') }}" class="btn btn-primary mb-2">Tambah Akun Pendaftar</a>

    


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jurusan as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->singkatan }}</td>
                    <td>
                        <img src="{{ asset('gambar/jurusan') }}/{{ $item->foto }}" alt="{{ $item->nama }}">
                    </td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <form action="/super-admin/jurusan/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button danger" class="hapus" onclick="confirmDelete('{{ $item->nama }}')">Hapus</button>
                        </form>
                        <button>
                            <a href="{{ route('updateJurusan', ['id' => $item->id]) }}">Edit Jurusan</a>

                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    
    </table>

    <div id="deleteConfirmation" class="confirmation-message">
        <p>Anda yakin ingin menghapus pengguna ini?</p>
        <button onclick="deleteUser()">Ya, Hapus</button>
        <button onclick="cancelDelete()">Batal</button>
    </div>
@endsection

<script src="{{ asset('js/informasi.js') }}"></script>
