@extends('layout/layout')

@section('space-work')
    <div class="container mt-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>

        <!-- Buat Download Excel wkkw -->
        <a href="{{ route('daftar.export') }}" class="btn btn-success">Export Data Pendaftar</a>

        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel_file">
            <button type="submit">Upload Excel</button>
        </form>


        <!-- Button untuk menambah pengguna -->
        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>


        <form action="{{ route('pendaftar.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" placeholder="Cari pengguna berdasarkan nama, NISN, atau NIK" class="form-control">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('succesDelete'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @elseif ($message = Session::get('succesUpdate'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>NIK</th>
                    <!-- Kolom lain -->
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            @if (count($users) > 0)
            <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nisn }}</td>
                            <td>{{ $user->nik }}</td>
                            <!-- Kolom lain -->
                            <td style="align-content: center;">
                                <a href="{{ route('pendaftar.show', $user->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                <a href="{{ route('pendaftar.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pendaftar.destroy', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                <!-- No Data Message -->
                <tr>
                    <td colspan="5" class="text-center">
                   
                        <img src="{{ asset('img/person.png') }}" alt="Sorry Image">

                        <p>Maaf, Pendaftar Belum di Tambahkan</p>
                       
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
@endsection
