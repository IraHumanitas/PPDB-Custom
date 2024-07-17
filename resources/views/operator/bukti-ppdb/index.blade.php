@extends('layout/layout')

@section('space-work')
    <div class="container">
        <h2 class="text-2xl font-bold mb-4">Data Bukti PPDB</h2>


        <a href="{{ route('bukti-ppdb.create') }}" class="btn btn-primary mb-2">Tambah Bukti PPDB</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action="{{ route('bukti-ppdb.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari bukti PPDB...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <table class="table">
            <!-- Tampilan tabel untuk data Bukti PPDB -->
        </table>
    </div>
@endsection
