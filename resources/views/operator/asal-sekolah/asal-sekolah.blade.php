@extends('layout/layout')

@section('space-work')
    <h2 class="text-2xl font-bold mb-4">Data Asal Sekolah</h2>


    <a href="{{ route('asal-sekolah.create') }}" class="btn btn-primary mb-2">Tambah Asal Sekolah Baru</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('asal-sekolah.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari Asal Sekolah berdasarkan nama...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mb-4">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Asal Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asalSekolahs as $asalSekolah)
                    <tr>
                        <td>{{ $asalSekolah->id }}</td>
                        <td>{{ $asalSekolah->name }}</td>
                        <td>
                            <form action="{{ route('asal-sekolah.destroy', $asalSekolah->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"  onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
