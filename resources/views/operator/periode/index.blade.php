@extends('layout/layout')

@section('space-work')
<div class="container mt-4">
    <h2 class="text-2xl font-bold mb-4">Daftar Periode</h2>
    <a href="{{ route('periode.create') }}" class="btn btn-primary mb-3">Tambah Periode</a>

    <form action="{{ route('periode.search') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" placeholder="Cari periode...">
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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tahun</th>
                <th scope="col">Tanggal Buka</th>
                <th scope="col">Tanggal Tutup</th>
                <th scope="col">Aktif</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodes as $periode)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $periode->tahun }}</td>
                    <td>{{ $periode->tanggal_buka }}</td>
                    <td>{{ $periode->tanggal_tutup }}</td>
                    <td>{{ $periode->aktif }}</td>
                    <td>
                    <form action="{{ route('periode.destroy', $periode->id_periode) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                        <a href="{{ route('periode.edit', $periode->id_periode) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- Include Bootstrap CSS and JS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
