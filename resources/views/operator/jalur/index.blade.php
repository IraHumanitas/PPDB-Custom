@extends('layout.layout')

@section('space-work')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Data Jalur</h2>


        <a href="{{ route('jalur.create') }}" class="btn btn-primary mb-2">Tambah Jalur</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action="{{ route('jalur.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari jalur...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jalur</th>
                    <th>Deskripsi</th>
                    <th>Kuota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jalurs as $jalur)
                    <tr>
                        <td>{{ $jalur->id_jalur }}</td>
                        <td>{{ $jalur->nama_jalur }}</td>
                        <td>{{ $jalur->deskripsi }}</td>
                        <td>{{ $jalur->kuota }}</td>
                        <td>
                        <form action="{{ route('jalur.destroy', $jalur->id_jalur) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                            <a href="{{ route('jalur.edit', $jalur->id_jalur) }}" class="btn btn-warning">Edit</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
