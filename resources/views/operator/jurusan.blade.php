@extends('layout.layout')

@section('space-work')
    <div class="container mt-4">
        <h2 class="text-2xl font-bold mb-4">Data Jurusan</h2>

        <a href="{{ route('jurusantambah') }}" class="btn btn-primary mb-2">Tambah Jurusan</a>

        <form action="{{ route('searchJurusan') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari jurusan berdasarkan nama...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Singkatan</th>
                    <th>Logo</th>
                    <th>Deskripsi</th>
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
                            <img src="{{ asset('gambar/jurusan/logo') }}/{{ $item->logo }}" alt="{{ $item->nama }}"
                                class="w-16 h-16 object-cover rounded">
                        </td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <form action="{{ route('jurusanhapus', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="confirmDelete('{{ $item->nama }}')">Hapus</button>
                            </form>

                            <button>
                                <a href="{{ route('editJurusan', ['idjurusan' => $item->id]) }}"
                                    class="btn btn-warning">Edit
                                    </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="deleteConfirmation" class="confirmation-message">
            <p>Anda yakin ingin menghapus pengguna ini?</p>
            <button onclick="deleteUser()"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Ya, Hapus</button>
            <button onclick="cancelDelete()"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</button>
        </div>
    </div>
@endsection

<script src="{{ asset('js/informasi.js') }}"></script>
