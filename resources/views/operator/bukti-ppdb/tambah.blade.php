@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h2>Tambah Bukti PPDB</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bukti-ppdb.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="bukti">Bukti</label>
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
            <div class="form-group">
                <label for="id_jalur">Jalur</label>
                <select name="id_jalur" class="form-control">
                    @foreach ($jalurs as $jalur)
                        <option value="{{ $jalur->id_jalur }}">{{ $jalur->nama_jalur }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
