@extends('layout/layout')

@section('space-work')

        <h2 class="text-2xl font-bold mb-4">Data Asal Kota</h2>

        <a href="{{ route('asal-kota.create') }}" class="btn btn-primary mb-2">Tambah Asal Kota Baru</a>

        <form action="{{ route('asal-kota.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Asal Kota...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success mb-4">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nama Asal Kota</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($asalKotas as $asalKota)
                        <tr>
                            <td class="px-4 py-2">{{ $asalKota->id }}</td>
                            <td class="px-4 py-2">{{ $asalKota->name }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('asal-kota.destroy', $asalKota->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
