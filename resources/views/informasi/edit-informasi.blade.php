@extends('layout/layout')

@section('space-work')

<form method="POST" action="{{ route('updateInformasiPPDB', ['id' => $informasi->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')   

        <div class="form-group">
            <label class="font-weight-bold">Upload Foto</label>
            @if ($informasi->foto)
                <img src="{{ asset('gambar/informasi/' . $informasi->foto) }}" alt="{{ $informasi->judul }}" class="img-thumbnail">
            @else
                <p>Tidak ada gambar yang sudah diunggah.</p>
            @endif
            <input type="file" name="foto" class="form-control" enctype="multipart/form-data" value="{{ $informasi->foto }}">
            @error('foto')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <br>

        <div class="form-group">
            <label class="font-weight-bold">Video Informasi</label>
            @if ($informasi->video)
                <p>Video yang sudah diunggah: <a href="{{ asset('video/informasi/' . $informasi->video) }}">Tautan Video</a></p>
            @else
                <p>Belum ada video diunggah.</p>
            @endif
            <input type="file" name="video" class="form-control" placeholder="Upload Foto" value="{{  $informasi->video }}">
            @error('video')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>



        <br>

        <div class="form-group">
            <label class="font-weight-bold">Judul Informasi</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Judul Post" value="{{ $informasi->judul }}">
            <!-- error message untuk title -->
            @error('judul')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Deskripsi Informasi</label>
            <textarea class="form-control" name="deskripsi" placeholder="Tambahkan deskripsi">{{ $informasi->deskripsi }}</textarea>
            <!-- error message untuk deskripsi -->
            @error('deskripsi')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Tanggal Informasi</label>
            <input type="date" class="form-control" name="date" max="{{ date('Y-m-d') }}" value="{{ $informasi->date ? \Carbon\Carbon::parse($informasi->date)->format('Y-m-d') : '' }}">
            @error('date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
<!-- 
        <label class="font-weight-bold">Jenis Informasi</label>
        <select name="jenis" id="jenis">
            <option value="0" @if($informasi->jenis == 0) selected @endif>PPDB</option>
            <option value="1" @if($informasi->jenis == 1) selected @endif>SMK Negeri 1 Cimahi</option>
        </select>
        @error('jenis')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror -->

        <br><br>

        <label for="checkbox">Tampilkan di Slider?</label>
        <input type="checkbox" id="checkbox" name="checkbox" value="1" @if($informasi->slider == 1) checked @endif>

        <br><br>

        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    </form>


    @endsection