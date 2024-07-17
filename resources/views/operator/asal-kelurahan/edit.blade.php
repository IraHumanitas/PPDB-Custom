@extends('layout/layout')

@section('space-work')
    
    <div class="container">
        <h1 class="mt-5" style="font-size: 2rem;">Form Edit Data Asal Kelurahan</h1>

        <br>

        <form action="{{ route('updateAsalKelurahan', ['id' => $asalKelurahan->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="name" value="{{ $asalKelurahan->name }}" required>
            </div>
            <div class="mb-3">
                <label for="jarak" class="form-label">Jarak:</label>
                <input type="number" class="form-control" name="jarak" value="{{ $asalKelurahan->jarak }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

@endsection
