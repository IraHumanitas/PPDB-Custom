@extends('layout/layout')

@section('space-work')
<br>

    <h1 class="text-2xl font-bold mb-4">Panitia PPDB</h2>
 
    <a href="{{ route('createUser') }}" class="btn btn-primary mb-2">Tambah User</a>

    <a href="{{ route('exportToExcel') }}" class="btn btn-success mb-2">
        <i class="bi bi-file-excel"></i> Unduh
    </a>

    <a href="{{ route('manageRole') }}" class="btn btn-warning mb-2">Manage User</a>

    <form action="{{ route('searchUser') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari pengguna berdasarkan nama...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @elseif ($message = Session::get('succesDelete'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @elseif ($message = Session::get('succesUpdate'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
    @endif

    @if (count($users) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if ($user->role == 1)
                                Administrator
                            @elseif ($user->role == 2)
                                Verifikator
                            @elseif ($user->role == 3)
                                Asal Sekolah
                            @elseif ($user->role == 4)
                                Informasi
                            @elseif ($user->role == 5)
                                Operator
                            @else
                                User
                            @endif
                        </td>


                        <td>
                            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $user->name }}', '{{ $user->id }}')">Hapus</button>
                            <form id="deleteForm{{ $user->id }}" action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            <img src="path/to/some-image.jpg" alt="Sorry Image">
            Maaf, tidak ada data yang ditemukan.
        </div>
        <a href="{{ route('superAdminUsers') }}" class="btn btn-primary">Kembali</a>
    @endif

    <div id="deleteConfirmation" class="confirmation-message" style="display: none;">
        <p>Anda yakin ingin menghapus pengguna ini?</p>
        <button onclick="deleteUser()" class="btn btn-danger">Ya, Hapus</button>
        <button onclick="cancelDelete()" class="btn btn-secondary">Batal</button>
    </div>
@endsection

@section('scripts')
    <!-- Include Bootstrap Icons library -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/dist/js/bootstrap-icons.min.js"></script>
    <script>
        function confirmDelete(userName, userId) {
            const confirmationMessage = document.getElementById('deleteConfirmation');
            confirmationMessage.style.display = 'block';
            // Tambahkan logika lain seperti menampilkan pesan yang menarik di sini

            // Simpan ID pengguna untuk penghapusan nanti
            document.getElementById('deleteUserId').value = userId;
        }

        function deleteUser() {
            // Ambil ID pengguna yang akan dihapus
            const userId = document.getElementById('deleteUserId').value;

            // Submit formulir penghapusan dengan ID yang sesuai
            document.getElementById(`deleteForm${userId}`).submit();
        }

        function cancelDelete() {
            const confirmationMessage = document.getElementById('deleteConfirmation');
            confirmationMessage.style.display = 'none';
        }
    </script>
@endsection
