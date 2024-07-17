@extends('layout.layout')

@section('space-work')
    <div class="container">
        <h2>Tambah Jalur Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jalur.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_jalur">Nama Jalur</label>
                <input type="text" class="form-control" id="nama_jalur" name="nama_jalur">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label for="kuota">Kuota</label>
                <input type="number" class="form-control" id="kuota" name="kuota">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
