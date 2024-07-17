@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h1>Detail Pengguna</h1>

        <div>
            <p>ID: {{ $user->id }}</p>
            <p>Nama: {{ $user->name }}</p>
            <p>NISN: {{ $user->nisn }}</p>
            <p>NIK: {{ $user->nik }}</p>
        </div>
    </div>
@endsection
