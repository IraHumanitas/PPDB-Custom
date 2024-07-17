@extends('layout/layout')

@section('space-work')
    <h1>Verifikasi Pendaftaran</h1>

    <br>
    <br>

    <div class="d-flex align-items-center mb-3">
    <a href="{{ route('formulir.export') }}" class="btn btn-success mx-1 flex-fill" style="width: 15%;">Export Formulir</a>

    <form action="{{ route('formulir.search') }}" method="GET" class="d-flex align-items-center mx-2 flex-fill" style="width: 85%;">
        <div class="input-group">
            <input type="text" name="keyword" placeholder="Cari pengguna berdasarkan nama, atau NISN" class="form-control">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    </div>


    <!-- <a href="{{ route('formulir-pendaftaran.create') }}" class="btn btn-primary mb-2">Tambah Formulir Pendaftaran</a> -->

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>No. Pendaftaran</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jalur</th>
                <th>Pilihan 1</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($formulirPendaftaran as $formulir)

                <tr>
                <td>{{ $formulir->id }}</td>
                    <td>{{ $formulir->no_pendaftaran ? $formulir->no_pendaftaran : 'Lengkapi Data Dulu!' }}</td>
                    <td>{{ $formulir->nama }}</td>
                    <td>{{ $formulir->nisn }}</td>
                    <td>{{ $formulir->jalur ? $formulir->jalur->nama_jalur : 'Nama Jalur Tidak Tersedia' }}</td>
                    <td>{{ $formulir->kompetensiKeahlian->nama_program ?? 'Edit untuk mengisi' }}</td>
                    <td>{{ $formulir->status_pendaftar->status ?? 'Belum Diverifikasi' }}</td> <!-- Tampilkan status dari status_pendaftar -->
                    <td>
                        <a href="{{ route('verifikasi-pendaftaran.edit', $formulir->id) }}" class="btn btn-info">Verifikasi</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

