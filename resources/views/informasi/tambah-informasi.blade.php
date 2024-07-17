@extends('layout/layout')

@section('space-work')

    <form action="{{ route('createInformasiPPDB') }}" method="POST" enctype="multipart/form-data">
                        
        @csrf       

        <div class="form-group">
            <label class="font-weight-bold">Upload Foto</label>
            <input type="file" class="form-control" name="foto" placeholder="Upload Foto">
                            
            <!-- error message untuk title -->
            @error('foto')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Video Informasi</label>
            <input type="file" name="video" class="form-control" placeholder="Upload Foto">
            @error('video')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>


        <br><br>

        <div class="form-group">
            <label class="font-weight-bold">Judul Informasi</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Masukkan Judul Post">
                            
            <!-- error message untuk title -->
            @error('judul')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
                @enderror
        </div>

        <div class="form-group">
            <label class="font-weight-bold">Deskripsi Informasi</label>
            <textarea class="form-control" name="deskripsi" placeholder="Tambahkan deskripsi"></textarea>
                                    
            <!-- error message untuk deskripsi -->
            @error('deskripsi')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>
        

        <br> <br>

        <div class="form-group">
            <label class="font-weight-bold">Tanggal Informasi</label>
            <input type="date" class="form-control" name="date" max="{{ date('Y-m-d') }}">
            
            <!-- error message untuk tanggal -->
            @error('date')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>

        <br>

        <label for="checkbox">Tampilkan di Slider?</label>
        <input type="checkbox" id="checkbox" name="checkbox" value="checkbox_value">
        @error('checkbox')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
        @enderror

        <br><br>



        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
        <button type="reset" class="btn btn-md btn-warning">RESET</button>

    </form> 

    @endsection