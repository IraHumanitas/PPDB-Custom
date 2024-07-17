@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h1>Data Pendaftar</h1>
        <br>
        
        <div class="d-flex align-items-center mb-3">
            <a href="{{ route('pendaftar.export') }}" class="btn btn-success mx-1" style="width: 15%;">Export Formulir</a>

            <form action="{{ route('userpendaftar.search') }}" method="GET" class="d-flex align-items-center mx-2 flex-fill">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari pengguna berdasarkan nama...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor/ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NISN</th>
                    <th scope="col">Asal Sekolah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendaftars as $pendaftar)
                    <tr>
                        <td>{{ $pendaftar->id }}</td>
                        <td>{{ $pendaftar->nama }}</td>
                        <td>{{ $pendaftar->nisn }}</td>
                        <td>
                            @if (isset($errors[$pendaftar->id]))
                                @foreach ($errors[$pendaftar->id] as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            @else
                                @if ($pendaftar->asalSekolah && $pendaftar->asalSekolah->name)
                                    {{ $pendaftar->asalSekolah->name }}
                                @else
                                    Edit untuk mengisi
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('userpendaftar.show', $pendaftar->id) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('userpendaftar.edit', $pendaftar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="deleteConfirmation" class="confirmation-message">
            <p>Anda yakin ingin menghapus Pendaftar ini?</p>
            <button onclick="deleteUser()" class="btn btn-danger">Ya, Hapus</button>
            <button onclick="cancelDelete()" class="btn btn-secondary">Batal</button>
        </div>
    </div>
@endsection

<script src="{{ asset('js/administrator.js') }}"></script>
