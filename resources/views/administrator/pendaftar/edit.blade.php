@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h1>Edit Data Pendaftar</h1>

        <a href="{{ route('userpendaftar.index') }}" class="btn btn-primary">Kembali</a>
        
        <form method="POST" action="{{ route('userpendaftar.update', $pendaftar->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Bagian Form Lainnya -->

            <div class="form-group">
                <label for="nama">Nama</label>
                <p>{{ $pendaftar->nama }}</p>
            </div>

            <div class="form-group">
                <label for="nama">Nomor Induk Keluarga</label>
                <p>{{ $pendaftar->nik }}</p>
            </div>

            <div class="form-group">
                <label for="nama">Nomor Induk Siswa Nasional</label>
                <p>{{ $pendaftar->nisn }}</p>
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ $pendaftar->tempat_lahir }}">
                @error('tempat_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $pendaftar->tanggal_lahir }}">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L" {{ $pendaftar->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pendaftar->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_asal_sekolah">Asal Sekolah</label>
                <select name="id_asal_sekolah" class="form-control">
                    @foreach ($asalSekolah as $sekolah)
                        <option value="{{ $sekolah->id }}" @if($pendaftar->
                            id_asal_sekolah == $sekolah->id) selected @endif>{{ $sekolah->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_asal_sekolah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" class="form-control" value="{{ $pendaftar->tahun_lulus }}">
                @error('tahun_lulus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="anak_ke">Anak Ke</label>
                <input type="text" name="anak_ke" class="form-control" value="{{ $pendaftar->anak_ke }}">
                @error('anak_ke')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jumlah_saudara">Jumlah Saudara</label>
                <input type="text" name="jumlah_saudara" class="form-control" value="{{ $pendaftar->jumlah_saudara }}">
                @error('jumlah_saudara')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" class="form-control">
                    <option value="Islam" {{ $pendaftar->agama === 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Protestan" {{ $pendaftar->agama === 'Protestan' ? 'selected' : '' }}>Protestan</option>
                    <option value="Katolik" {{ $pendaftar->agama === 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Buddha" {{ $pendaftar->agama === 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Hindu" {{ $pendaftar->agama === 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Konghucu" {{ $pendaftar->agama === 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp">Nomor Handphone</label>
                <input type="number" name="hp" class="form-control" value="{{ $pendaftar->hp }}">
                @error('hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $pendaftar->alamat }}">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_asal_kelurahan">Kelurahan</label>
                <select name="id_asal_kelurahan" class="form-control">
                    @foreach ($asalKelurahan as $kelurahan)
                        <option value="{{ $kelurahan->id }}" @if($pendaftar->
                        id_asal_kelurahan == $kelurahan->id) selected @endif>{{ $kelurahan->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_asal_kelurahan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control" value="{{ $pendaftar->kecamatan }}">
                @error('kecamatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_asal_kota">Asal Kota</label>
                <select name="id_asal_kota" class="form-control">
                    @foreach ($asalKota as $kota)
                        <option value="{{ $kota->id }}" @if($pendaftar->
                            id_asal_kota == $kota->id) selected @endif>{{ $kota->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_asal_kota')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ $pendaftar->provinsi }}">
                @error('provinsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" name="kode_pos" class="form-control" value="{{ $pendaftar->kode_pos }}">
                @error('kode_pos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" value="{{ $pendaftar->nama_ayah }}">
                @error('nama_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_ayah">NIK Ayah</label>
                <input type="text" name="nik_ayah" class="form-control" value="{{ $pendaftar->nik_ayah }}">
                @error('nik_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" class="form-control" value="{{ $pendaftar->pekerjaan_ayah }}">
                @error('pekerjaan_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_ayah">Nomor Handphone Ayah</label>
                <input type="text" name="hp_ayah" class="form-control" value="{{ $pendaftar->hp_ayah }}">
                @error('hp_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" value="{{ $pendaftar->nama_ibu }}">
                @error('nama_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_ibu">NIK Ibu</label>
                <input type="text" name="nik_ibu" class="form-control" value="{{ $pendaftar->nik_ibu }}">
                @error('nik_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" class="form-control" value="{{ $pendaftar->pekerjaan_ibu }}">
                @error('pekerjaan_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_ibu">Nomor Handphone Ibu</label>
                <input type="text" name="hp_ibu" class="form-control" value="{{ $pendaftar->hp_ibu }}">
                @error('hp_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_ibu">Alamat Orang Tua</label>
                <input type="text" name="alamat_ortu" class="form-control" value="{{ $pendaftar->alamat_ortu }}">
                @error('alamat_ortu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control" value="{{ $pendaftar->nama_wali }}">
                @error('nama_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_wali">NIK Wali</label>
                <input type="text" name="nik_wali" class="form-control" value="{{ $pendaftar->nik_wali }}">
                @error('nik_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                <input type="text" name="pekerjaan_wali" class="form-control" value="{{ $pendaftar->pekerjaan_wali }}">
                @error('pekerjaan_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_wali">Nomor Handphone Wali</label>
                <input type="text" name="hp_wali" class="form-control" value="{{ $pendaftar->hp_wali }}">
                @error('hp_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_wali">Alamat Wali</label>
                <input type="text" name="alamat_wali" class="form-control" value="{{ $pendaftar->alamat_wali }}">
                @error('alamat_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Akta Kelahiran Input -->
            <div class="form-group">
                <label class="font-weight-bold">Akta Kelahiran</label>
                @if ($pendaftar->aktakelahiran)
                    <embed src="{{ asset('gambar/pendaftar/akta-kelahiran/' . $pendaftar->aktakelahiran) }}" width="500" height="375" type='application/pdf'>
                @else
                    <p>Tidak ada akta kelahiran yang sudah diunggah.</p>
                @endif
                <input type="file" name="aktakelahiran" class="form-control">
                @error('aktakelahiran')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Kartu Keluarga Input -->
            <div class="form-group">
                <label class="font-weight-bold">Kartu Keluarga</label>
                @if ($pendaftar->kartukeluarga)
                    <embed src="{{ asset('gambar/pendaftar/kartu-keluarga/' . $pendaftar->kartukeluarga) }}" width="500" height="375" type='application/pdf'>
                @else
                    <p>Tidak ada kartu keluarga yang sudah diunggah.</p>
                @endif
                <input type="file" name="kartukeluarga" class="form-control">
                @error('kartukeluarga')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ... (Kode Blade View Tetap Sama) -->


            
            <div class="form-group">
                <label for="no_kk">Nomor Kartu Keluarga</label>
                <input type="text" name="no_kk" class="form-control" value="{{ $pendaftar->no_kk }}">
                @error('no_kk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
