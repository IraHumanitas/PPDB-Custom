@extends('layout/layout')

@section('space-work')
    <h1 class="mb-4">Tambah Minat Bakat</h1>

    <form action="{{ route('minatBakat.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="pertanyaan">Pertanyaan</label>
            <input type="text" class="form-control" name="pertanyaan" required>
        </div>
        <!-- Tambahkan input fields sesuai dengan kolom pada tabel Minat Bakat -->
        <button type="submit" class="btn btn-success">Tambahkan</button>
    </form>
@endsection
