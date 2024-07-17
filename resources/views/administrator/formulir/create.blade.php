@extends('layout/layout')

@section('space-work')
    <h1>Tambah Formulir Pendaftaran Baru</h1>

    <form action="{{ route('formulir-pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Pilihan dropdown -->
<div class="form-group">
    <label for="pendaftar_id">Pilih Pendaftar Berdasarkan Nama:</label>
    <select id="pendaftar_id" name="pendaftar_id" class="form-control">
        <option value="">Pilih Pendaftar</option>
        @foreach($pendaftar as $pendaftar)
            <option value="{{ $pendaftar->id }}">{{ $pendaftar->nama }}</option>
        @endforeach
    </select>
</div>

<!-- Bagian formulir yang akan ditampilkan -->
<div id="dynamic-form">
    <!-- Bagian untuk Jalur -->
    <div class="form-group" id="jalur-section" style="display: none;">
        <label for="id_jalur">Jalur:</label>
        <select id="id_jalur" name="id_jalur" class="form-control" required>
            <option value="">Pilih Jalur</option>
            @foreach($jalur as $data)
                <option value="{{ $data->id_jalur }}">{{ $data->nama }}</option>
            @endforeach
        </select>
    </div>

    <!-- Bagian untuk Program Keahlian -->
    <div class="form-group" id="program-keahlian-section" style="display: none;">
        <label for="id_keahlian">Program Keahlian:</label>
        <select id="id_keahlian" name="id_keahlian" class="form-control" required>
            <option value="">Pilih Program Keahlian</option>
            @foreach($programKeahlian as $data)
                <option value="{{ $data->id_keahlian }}">{{ $data->nama }}</option>
            @endforeach
        </select>
    </div>
</div>

<!-- JavaScript untuk menampilkan formulir berdasarkan pilihan dropdown -->
<script>
    document.getElementById('pendaftar_id').addEventListener('change', function() {
        var selectedValue = this.value;

        // Menyembunyikan semua bagian formulir
        document.getElementById('jalur-section').style.display = 'none';
        document.getElementById('program-keahlian-section').style.display = 'none';

        // Menampilkan bagian formulir yang sesuai berdasarkan pilihan
        if (selectedValue === '1') { // Ubah '1' dengan nilai pilihan yang sesuai
            document.getElementById('jalur-section').style.display = 'block';
        } else if (selectedValue === '2') { // Ubah '2' dengan nilai pilihan yang sesuai
            document.getElementById('program-keahlian-section').style.display = 'block';
        }
    });
</script>

@endsection


