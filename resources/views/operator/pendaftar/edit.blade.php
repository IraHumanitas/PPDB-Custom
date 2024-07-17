@extends('layout/layout')

@section('space-work')
    <h1>Edit User</h1>

    <form method="POST" action="{{ route('pendaftar.update', ['id' => $user->id]) }}">
        @csrf
        @method('PUT') <!-- Menandai bahwa ini adalah permintaan PUT untuk update -->

        <input type="text" name="name" placeholder="Nama" value="{{ $user->name }}">
         <!-- error message untuk title -->
         @error('name')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        <br><br>

        <input type="text" name="username" placeholder="Username" value="{{ $user->username }}">
        @error('username')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        <br><br>

        <input type="text" name="nisn" placeholder="NISN" value="{{ $user->nisn }}">
        @error('nisn')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        <br><br>

        <input type="text" name="nik" placeholder="NIK" value="{{ $user->nik }}">
        @error('nik')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        <br><br>

      
        <br>
        <br> 

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
