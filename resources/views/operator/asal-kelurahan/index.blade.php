@extends('layout/layout')

@section('space-work')

    <style>
        .container {
            font-family: 'Montserrat', sans-serif;
        }

        .btn-danger,
        .btn-warning {
            display: inline-block;
            vertical-align: top;
            transition: filter 0.3s;
        }
        

        .btn-danger{
            background-color: red;
        }

        .btn-delete:hover,
        .btn-edit:hover {
            filter: brightness(110%);
        }

    </style>

    <div class="container mt-5">

        <h2 class="mb-4 text-center text-primary font-weight-bold" style="font-size: 2rem;">Asal Kelurahan</h2>

        <a href="{{ route('createAsalKelurahan') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Tambah Asal Kelurahan
        </a>

        <form action="{{ route('asalKelurahan.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari asal kelurahan...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped text-center" style="font-size: 1rem;">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">
                        Jarak
                        <button class="btn-sort btn btn-link" data-column="jarak" data-order="asc">&#9650;</button>
                        <button class="btn-sort btn btn-link" data-column="jarak" data-order="desc">&#9660;</button>
                    </th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asalKelurahans as $asalKelurahan)
                    <tr>
                        <td>{{ $asalKelurahan->id }}</td>
                        <td>{{ $asalKelurahan->name }}</td>
                        <td>{{ $asalKelurahan->jarak }}</td>
                        <td>
                            <form action="{{ route('deleteAsalKelurahan', ['id' => $asalKelurahan->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger" onclick="showDeleteConfirmation({{ $asalKelurahan->id }})">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                            <a href="{{ route('editAsalKelurahan', ['id' => $asalKelurahan->id]) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="deleteConfirmation" class="confirmation-message text-center" style="display: none;">
            <p class="mb-3">Anda yakin ingin menghapus asal kelurahan ini?</p>
            <button class="btn btn-delete mr-2" onclick="deleteUser()">Ya, Hapus</button>
            <button class="btn btn-secondary" onclick="cancelDelete()">Batal</button>
        </div>

    </div>

@endsection

<script src="{{ asset('js/asal-kelurahan.js') }}"></script>
