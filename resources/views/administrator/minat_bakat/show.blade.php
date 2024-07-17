@extends('layout/layout')

@section('space-work')
    <h1 class="mb-4">Detail Minat Bakat</h1>

    <p>ID: {{ $minatBakat->id }}</p>
    <p>Pertanyaan: {{ $minatBakat->pertanyaan }}</p>
    <!-- Tampilkan detail sesuai dengan kolom pada tabel Minat Bakat -->

    <a href="{{ route('minatBakat.index') }}" class="btn btn-primary">Kembali</a>
@endsection
