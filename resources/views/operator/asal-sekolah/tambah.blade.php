@extends('layout/layout')

@section('space-work')
    <h2 class="text-2xl font-bold mb-4">Tambah Data Asal Sekolah</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asal-sekolah.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Asal Sekolah</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
