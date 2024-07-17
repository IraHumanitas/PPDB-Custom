@extends('layout/layout')

@section('space-work')
    
    <div class="container">
        <h1 class="mt-5" style="font-size: 2rem;">Form Tambah Data Asal Kelurahan</h1>

        <br>

        <form action="{{ route('createAsalKelurahan') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="jarak" class="form-label">Jarak:</label>
                <input type="number" class="form-control" name="jarak" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection
