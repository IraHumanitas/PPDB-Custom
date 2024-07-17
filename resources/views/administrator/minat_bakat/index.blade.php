@extends('layout/layout')

@section('space-work')
    <h1 class="mb-4">Data Minat Bakat</h1>

    <a href="{{ route('minatBakat.create') }}" class="btn btn-success mb-3">Tambah Minat Bakat</a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pertanyaan</th>
                    <th>Pilihan 1</th>
                    <th>Pilihan 2</th>
                    <th>Pilihan 3</th>
                    <th>Pilihan 4</th>
                    <th>Pilihan 5</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($minatBakats as $minatBakat)
                    <tr>
                        <td>{{ $minatBakat->id }}</td>
                        <td>{{ $minatBakat->pertanyaan }}</td>
                        <td>{{ $minatBakat->pilihan1 }}</td>
                        <td>{{ $minatBakat->pilihan2 }}</td>
                        <td>{{ $minatBakat->pilihan3 }}</td>
                        <td>{{ $minatBakat->pilihan4 }}</td>
                        <td>{{ $minatBakat->pilihan5 }}</td>
                        <td>
                            <a href="{{ route('minatBakat.show', $minatBakat->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('minatBakat.edit', $minatBakat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('minatBakat.destroy', $minatBakat->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
