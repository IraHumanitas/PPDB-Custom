@extends('layout/layout')

@section('space-work')

    <div class="container mt-5">
        <h2 class="text-2xl font-bold mb-4">Tambah User</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('createUser') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value="0">Operator</option>
                    <option value="2">Verifikator</option>
                    <option value="3">Informasi</option>
                    <option value="4">Asal Sekolah</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah User</button>
        </form>

        
    </div>

@endsection
