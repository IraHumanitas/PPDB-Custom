@extends('layout/layout')

@section('space-work')

    <div class="container">
        <h1>Detail Formulir Pendaftaran</h1>

        <a href="{{ route('formulir-pendaftaran.index') }}" class="btn btn-primary">Kembali</a>

        <form method="POST" action="{{ route('formulir-pendaftaran.update', $formulir->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">No Pendaftaran: {{ $formulir->id}}</h5>
                <p class="card-text"><strong>Nama:</strong> {{ $formulir->nama }}</p>
                <p class="card-text"><strong>NISN:</strong> {{ $formulir->nisn }}</p>

                <div class="form-group">
                    <label for="id_periode">Periode Pendaftaran</label>
                    <select name="id_periode" class="form-control">
                        @foreach ($periodes as $periode)
                            <option value="{{ $periode->id_periode }}" @if($formulir->
                            id_periode == $periode->id_periode) selected @endif>{{ $periode->tahun }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_periode')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_keahlian">Pilihan 1 Kompetensi Keahlian</label>
                    <select name="id_keahlian" class="form-control">
                        @foreach ($kompetensis as $kompetensi)
                            <option value="{{ $kompetensi->id_keahlian }}" @if($formulir->
                            id_kompetensi == $kompetensi->id_keahlian) selected @endif>{{ $kompetensi->nama_program }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_keahlian')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_kompetensi">Pilihan 2 Kompetensi Keahlian</label>
                    <select name="id_kompetensi" class="form-control">
                        @foreach ($kompetensis as $kompetensi)
                            <option value="{{ $kompetensi->id_keahlian }}" @if($formulir->
                            id_keahlian == $kompetensi->id_keahlian) selected @endif>{{ $kompetensi->nama_program }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_keahlian')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="id_jalur">Jalur Pendaftaran</label>
                    <select name="id_jalur" class="form-control">
                        @foreach ($jalurs as $jalur)
                            <option value="{{ $jalur->id_jalur }}" @if($formulir->
                                id_jalur == $jalur->id_jalur) selected @endif>{{ $jalur->nama_jalur }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jalur')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              

                 <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Berperilaku Baik</label>
                    @if ($formulir->skck)
                        <embed src="{{ asset('gambar/pendaftar/skck/' . $formulir->skck) }}" width="500" height="375">
                    @else
                        <p>Tidak ada skck yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="skck" class="form-control">
                    @error('skck')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                 <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Pas Foto</label>
                    @if ($formulir->foto)
                        <embed src="{{ asset('gambar/pendaftar/foto/' . $formulir->foto) }}" width="500" height="375">
                    @else
                        <p>Tidak ada Pas Foto yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="foto" class="form-control">
                    @error('foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Sehat</label>
                    @if ($formulir->surat_sehat)
                        <embed src="{{ asset('gambar/pendaftar/surat_sehat/' . $formulir->surat_sehat) }}" width="500" height="375">
                    @else
                        <p>Tidak ada surat sehat yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="surat_sehat" class="form-control">
                    @error('surat_sehat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <!-- Foto Input -->
                 <div class="form-group">
                    <label class="font-weight-bold">Ijazah</label>
                    @if ($formulir->skhun)
                        <embed src="{{ asset('gambar/pendaftar/skhun/' . $formulir->skhun) }}" width="500" height="375">
                    @else
                        <p>Tidak ada skhun yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="skhun" class="form-control">
                    @error('skhun')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Surat Keterangan Lulus</label>
                    @if ($formulir->surat_lulus)
                        <embed src="{{ asset('gambar/pendaftar/surat_lulus/' . $formulir->surat_lulus) }}" width="500" height="375">
                    @else
                        <p>Tidak ada surat lulus yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="surat_lulus" class="form-control" value="{{ $formulir->surat_lulus  }}">
                    @error('surat_lulus')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Bukti Pendaftaran Sesuai Jalur yang Dituju</label>
                    @if ($formulir->bukti)
                        <embed src="{{ asset('gambar/pendaftar/bukti/' . $formulir->bukti) }}" width="500" height="375">
                    @else
                        <p>Tidak ada bukti yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="bukti" class="form-control">
                    @error('bukti')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Foto Input -->
                <div id="formBukti2" style="display: none;">
                    <label class="font-weight-bold">Bukti Pendaftaran Sesuai Jalur yang Dituju</label>
                    @if ($formulir->bukti2)
                        <embed src="{{ asset('gambar/pendaftar/bukti/' . $formulir->bukti2) }}" width="500" height="375">
                    @else
                        <p>Tidak ada bukti yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="bukti2" class="form-control">
                    @error('bukti2')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Foto Input -->
                <div class="form-group">
                    <label class="font-weight-bold">Bukti Pendaftaran Sesuai Jalur yang Dituju</label>
                    @if ($formulir->bukti3)
                        <embed src="{{ asset('gambar/pendaftar/bukti/' . $formulir->bukti3) }}" width="500" height="375">
                    @else
                        <p>Tidak ada bukti yang sudah diunggah.</p>
                    @endif
                    <input type="file" name="bukti3" class="form-control">
                    @error('bukti3')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
@endsection
