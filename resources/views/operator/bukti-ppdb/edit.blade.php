@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h2>Edit Bukti PPDB</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bukti-ppdb.update', $buktiPpdb->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="bukti">Bukti</label>
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
            <div class="form-group">
                <label for="id_jalur">Jalur</label>
                <select name="id_jalur" class="form-control">
                    @foreach ($jalurs as $jalur)
                        <option value="{{ $jalur->id_jalur }}" @if($buktiPpdb->jalur->id_jalur === $jalur->id_jalur) selected @endif>{{ $jalur->nama_jalur }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
