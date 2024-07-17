@extends('layout/layout')

@section('space-work')
    <h1 class="mb-4">Edit Minat Bakat</h1>

    <form action="{{ route('minatBakat.update', $minatBakat->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <input type="text" class="form-control" name="pertanyaan" value="{{ $minatBakat->pertanyaan }}" required>
        </div>
        <!-- Tambahkan input fields sesuai dengan kolom pada tabel Minat Bakat -->
        <button type="submit" class="btn btn-success">Perbarui</button>
    </form>
@endsection
