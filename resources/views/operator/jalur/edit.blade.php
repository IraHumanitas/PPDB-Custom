@extends('layout.layout')

@section('space-work')
    <div class="container">
        <h2>Edit Jalur</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('jalur.update', $jalur->id_jalur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_jalur">Nama Jalur</label>
                <input type="text" class="form-control" id="nama_jalur" name="nama_jalur" value="{{ $jalur->nama_jalur }}">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $jalur->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="kuota">Kuota</label>
                <input type="number" class="form-control" id="kuota" name="kuota" value="{{ $jalur->kuota }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
