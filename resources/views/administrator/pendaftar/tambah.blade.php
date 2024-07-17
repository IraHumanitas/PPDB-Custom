@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h1>Tambah Data Pendaftar</h1>

        <a href="{{ route('userpendaftar.index') }}" class="btn btn-primary">Kembali</a>
        
        <form method="POST" action="{{ route('userpendaftar.store') }}">
            @csrf

            <div class="form-group">
            <label for="nama">Nama</label>
                <select name="nama" class="form-control">
                    @foreach($userPendaftar as $user)
                        <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                    @endforeach
                </select>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <select name="nik" class="form-control">
                    @foreach($userPendaftar as $user)
                        <option value="{{ $user->nik }}">{{ $user->nik }}</option>
                    @endforeach
                </select>
                @error('nik')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nisn">NISN</label>
                <select name="nisn" class="form-control">
                    @foreach($userPendaftar as $user)
                        <option value="{{ $user->nisn }}">{{ $user->nisn }}</option>
                    @endforeach
                </select>
                @error('nisn')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control">
                @error('tempat_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">
                    Tanggal Lahir
                </label>
                <input type="date" class="form-control" name="tanggal_lahir" max="{{ date('Y-m-d') }}">
                
                <!-- error message untuk tanggal -->
                @error('date')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="anak_ke">Anak Ke </label>
                <input type="text" name="anak_ke" class="form-control">
                @error('anak_ke')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="anak_ke">Dari</label>
                <input type="text" name="jumlah_saudara" class="form-control">
                @error('jumlah_saudara')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="anak_ke">Bersaudara</label>
            </div>

            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" class="form-control">
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Animisme">Animisme</option>
                </select>
                @error('agama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp">Nomor Handphone</label>
                <input type="number" name="hp" class="form-control">
                @error('hp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" class="form-control">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelurahan">Kelurahan</label>
                <input type="text" name="kelurahan" class="form-control">
                @error('kelurahan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" name="kecamatan" class="form-control">
                @error('kecamatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_asal_kota">Asal Kota</label>
                <select name="id_asal_kota" class="form-control">
                    @foreach ($asalKota as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->name }}</option>
                    @endforeach
                </select>
                @error('id_asal_kota')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" class="form-control">
                @error('provinsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="number" name="kode_pos" class="form-control">
                @error('kode_pos')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

    

            <h3>Data Orang Tua</h3>

            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control">
                @error('nama_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_ayah">NIK Ayah</label>
                <input type="text" name="nik_ayah" class="form-control">
                @error('nik_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" class="form-control">
                @error('pekerjaan_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_ayah">Nomor Handphone Ayah</label>
                <input type="text" name="hp_ayah" class="form-control">
                @error('hp_ayah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control">
                @error('nama_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_ibu">NIK Ibu</label>
                <input type="text" name="nik_ibu" class="form-control">
                @error('nik_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" class="form-control">
                @error('pekerjaan_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_ibu">Nomor Handphone Ibu</label>
                <input type="text" name="hp_ibu" class="form-control">
                @error('hp_ibu')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

  
            <h3>Data Wali Siswa</h3>

            <div class="form-group">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" name="nama_wali" class="form-control">
                @error('nama_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nik_wali">NIK Wali</label>
                <input type="text" name="nik_wali" class="form-control">
                @error('nik_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                <input type="text" name="pekerjaan_wali" class="form-control">
                @error('pekerjaan_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hp_wali">Nomor Handphone Wali</label>
                <input type="text" name="hp_wali" class="form-control">
                @error('hp_wali')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="id_asal_sekolah">
                    Asal Sekolah
                </label>
                <select name="id_asal_sekolah" class="form-control">
                    @foreach ($asalSekolah as $sekolah)
                        <option value="{{ $sekolah->id }}">{{ $sekolah->name }}</option>
                    @endforeach
                </select>
                @error('id_asal_sekolah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tahun_lulus">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" class="form-control">
                @error('tahun_lulus')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
@endsection
