@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h1>Detail Pendaftar</h1>

        <a href="{{ route('userpendaftar.index') }}" class="btn btn-primary">Kembali</a>

        <div class="card">
            <div class="card-body">

            <h5 class="card-title">Nomor/ID: {{ $pendaftar->id }}</h5>

            <p class="card-text">Nama: {{ $pendaftar->nama ?? 'Belum diisi' }}</p>

            <p class="card-text">NIK: {{ $pendaftar->nik ?? 'Belum diisi' }}</p>

            <p class="card-text">NISN: {{ $pendaftar->nisn ?? 'Belum diisi' }}</p>

            <p class="card-text">Tempat Lahir: {{ $pendaftar->tempat_lahir ?? 'Belum diisi' }}</p>

            <p class="card-text">Tanggal Lahir: {{ $pendaftar->tanggal_lahir ?? 'Belum diisi' }}</p>

            <p class="card-text">Jenis Kelamin: {{ $pendaftar->jenis_kelamin ?? 'Belum diisi' }}</p>

            <p class="card-text">Anak Ke: {{ $pendaftar->anak_ke ?? 'Belum diisi' }}</p>

            <p class="card-text">Jumlah Saudara: {{ $pendaftar->jumlah_saudara ?? 'Belum diisi' }}</p>

            <p class="card-text">Agama: {{ $pendaftar->agama ?? 'Belum diisi' }}</p>

            <p class="card-text">Nomor Handphone: {{ $pendaftar->hp ?? 'Belum diisi' }}</p>

            <p class="card-text">Alamat: {{ $pendaftar->alamat ?? 'Belum diisi' }}</p>

            <p class="card-text">Kelurahan: {{ $pendaftar->kelurahan ?? 'Belum diisi' }}</p>

            <p class="card-text">Kecamatan: {{ $pendaftar->kecamatan ?? 'Belum diisi' }}</p>

            <p class="card-text">Provinsi: {{ $pendaftar->provinsi ?? 'Belum diisi' }}</p>

            @if (empty($pendaftar->asalSekolah->name))
                <p class="card-text">Asal Sekolah: <span class="text-danger">Belum terisi.</span></p>
            @else
                <p class="card-text">Asal Sekolah: {{ $pendaftar->asalSekolah->name }}</p>
            @endif

            <p class="card-text">Kode Pos: {{ $pendaftar->kode_pos ?? 'Belum diisi' }}</p>

            <p class="card-text">Nama Ayah: {{ $pendaftar->nama_ayah ?? 'Belum diisi' }}</p>

            <p class="card-text">NIK Ayah: {{ $pendaftar->nik_ayah ?? 'Belum diisi' }}</p>

            <p class="card-text">Pekerjaan Ayah: <p class="text danger">{{ $pendaftar->pekerjaan_ayah ?? 'Belum diisi' }}</p>

            <p class="card-text">Nomor Handphone Ayah: {{ $pendaftar->hp_ayah ?? 'Belum diisi' }}</p>

            <p class="card-text">Nama Ibu: {{ $pendaftar->nama_ibu ?: 'Belum diisi' }}</p>

            <p class="card-text">NIK Ibu: {{ $pendaftar->nik_ibu ?? 'Belum diisi' }}</p>

            <p class="card-text">Pekerjaan Ibu: {{ $pendaftar->pekerjaan_ibu ?? 'Belum diisi' }}</p>

            <p class="card-text">Nomor Handphone Ibu: {{ $pendaftar->hp_ibu ?? 'Belum diisi' }}</p>

            <p class="card-text">Nama Wali: {{ $pendaftar->nama_wali ?? 'Belum diisi' }}</p>

            <p class="card-text">NIK Wali: {{ $pendaftar->nik_wali ?? 'Belum diisi' }}</p>

            <p class="card-text">Pekerjaan Wali: {{ $pendaftar->pekerjaan_wali ?? 'Belum diisi' }}</p>

            <p class="card-text">Nomor Handphone Wali: {{ $pendaftar->hp_wali ?? 'Belum diisi' }}</p>

            <p class="card-text">Akta Kelahiran</p>
            @if ($pendaftar->aktakelahiran)
                <img src="{{ asset('gambar/pendaftar/akta-kelahiran') }}/{{ $pendaftar->aktakelahiran }}" alt="{{ $pendaftar->aktakelahiran }}">
            @else
                <p>Akta Kelahiran belum diupload</p>
            @endif

            <p class="card-text">Kartu Keluarga:</p>
            @if ($pendaftar->kartukeluarga)
                <img src="{{ asset('gambar/pendaftar/kartu-keluarga') }}/{{ $pendaftar->kartukeluarga }}" alt="{{ $pendaftar->kartukeluarga }}">
            @else
                <p>Kartu Keluarga Belum di Upload</p>
            @endif

                

            @if (empty($pendaftar->asalSekolah->name))
                <p class="card-text">Asal Sekolah: <span class="text-danger">Edit untuk mengisi</span></p>
            @else
                <p class="card-text">Asal Sekolah: {{ $pendaftar->asalSekolah->name }}</p>
            @endif

            <p class="card-text">Tahun Lulus: {{ $pendaftar->tahun_lulus ?? 'Belum diisi' }}</p>


                <a href="{{ route('userpendaftar.edit', $pendaftar->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
@endsection
