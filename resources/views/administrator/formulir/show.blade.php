@extends('layout/layout')

@section('space-work')

    <div class="container">
        <h1>Detail Formulir Pendaftaran</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No Pendaftaran: {{ $formulir->id_formulir }}</h5>
                <p class="card-text"><strong>Nama:</strong> {{ $formulir->nama }}</p>
                <p class="card-text"><strong>NISN:</strong> {{ $formulir->nisn }}</p>
                
                <!-- periode Pendaftaran -->
                <!-- periode Pendaftaran -->
                <p class="card-text"><strong>Periode Pendaftaran:</strong> 
                    @if ($formulir->periode)
                        {{ $formulir->periode->tahun }}
                    @else
                        Edit untuk mengisi
                    @endif
                </p>

                <!-- Pilihan 1 -->
                <p class="card-text"><strong>Kompetensi Keahlian Pilihan 1:</strong> {{ $formulir->kompetensiKeahlian->nama_program ?? 'Edit untuk mengisi' }}</p>
                                
                <p class="card-text"><strong>Kompetensi Keahlian Pilihan 2:</strong> {{ $formulir->kompetensiKeahlian->nama_program ?? 'Edit untuk mengisi' }}</p>

                <!-- Pilihan 2 -->
                <p class="card-text"><strong>Jalur Pendaftaran:</strong> {{ $formulir->jalur->nama ?? 'Edit untuk mengisi' }}</p>


                
                <!-- Pas Foto -->
                <div class="form-group">
                    <label class="font-weight-bold">Pas Foto</label>
                    @if ($formulir->foto)
                        <embed src="{{ asset('gambar/pendaftar/foto/' . $formulir->foto) }}" width="500" height="375">
                    @else
                        <p>Tidak ada foto yang sudah diunggah.</p>
                    @endif
                </div>

                <!-- Tambahkan kode untuk menampilkan surat keterangan berkelakuan baik -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Berkelakuan Baik</label>
                    @if ($formulir->skck)
                        <embed src="{{ asset('gambar/pendaftar/skck/' . $formulir->skck) }}" width="500" height="375">
                    @else
                        <p>Tidak ada Surat Keterangan Berkelakuan Baik yang sudah diunggah.</p>
                    @endif
                </div>

                <!-- Tambahkan kode untuk menampilkan surat keterangan sehat -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Sehat</label>
                    @if ($formulir->surat_sehat)
                        <embed src="{{ asset('gambar/pendaftar/surat_sehat/' . $formulir->surat_sehat) }}" width="500" height="375">
                    @else
                        <p>Tidak ada surat sehat yang sudah diunggah.</p>
                    @endif
                </div>
                
                <!-- Tambahkan kode untuk menampilkan ijazah -->
                <div class="form-group">
                    <label class="font-weight-bold">skhun</label>
                    @if ($formulir->skhun)
                        <embed src="{{ asset('gambar/pendaftar/skhun/' . $formulir->skhun) }}" width="500" height="375">
                    @else
                        <p>Tidak ada skhun yang sudah diunggah.</p>
                    @endif
                </div>

                <!-- Tambahkan kode untuk menampilkan surat keterangan lulus -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Lulus</label>
                    @if ($formulir->surat_lulus)
                        <embed src="{{ asset('gambar/pendaftar/surat_lulus/' . $formulir->surat_lulus) }}" width="500" height="375">
                    @else
                        <p>Tidak ada surat lulus yang sudah diunggah.</p>
                    @endif
                </div>

                <!-- Tambahkan kode untuk menampilkan bukti pendaftaran sesuai jalur -->
                <div class="form-group">
                    <label class="font-weight-bold">Bukti Pendaftaran Sesuai Jalur yang Dituju</label>
                    @if ($formulir->bukti)
                        <embed src="{{ asset('gambar/pendaftar/bukti/' . $formulir->bukti) }}" width="500" height="375">
                    @else
                        <p>Tidak ada bukti yang sudah diunggah.</p>
                    @endif
                </div>

                <a href="{{ route('formulir-pendaftaran.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
