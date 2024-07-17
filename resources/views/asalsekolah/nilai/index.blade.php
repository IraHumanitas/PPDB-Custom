@extends('layout/layout')

@section('space-work')
<div class="container">
    <h1 class="text-center mt-4 mb-4">Nilai Rapot Siswa</h1>


    <div class="d-flex align-items-center mb-3">
    <a href="{{ route('nilai.export') }}" class="btn btn-success mx-1 flex-fill" style="width: 15%;">Export Nilai</a>


    <form action="{{ route('nilai.search') }}" method="GET" class="d-flex align-items-center mx-2 flex-fill" style="width: 70%;">
        <div class="input-group">
            <input type="text" name="search" class="form-control flex-fill" placeholder="Cari berdasarkan NISN atau Nama">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
        </div>
    </form>
</div>




    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="align-items-center">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Avg. Sem. 1</th>
                <th scope="col">Avg. Sem. 2</th>
                <th scope="col">Avg. Sem. 3</th>
                <th scope="col">Avg. Sem. 4</th>
                <th scope="col">Avg. Sem. 5</th>
                <th scope="col">Avg. Sem. 6</th>
               
                <th scope="col" >Total Nilai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilaiRapots as $nilaiRapot)
            <tr>
                <td>{{ $nilaiRapot->nisn }}</td>
                <td>{{ $nilaiRapot->nama }}</td>
                <td class="bg-light">{{ number_format($nilaiRapot->calculateSemesterAverage(1) ?? 0, 2) }}</td>
                <td>{{ number_format($nilaiRapot->calculateSemesterAverage(2) ?? 0, 2) }}</td>
                <td class="bg-light">{{ number_format($nilaiRapot->calculateSemesterAverage(3) ?? 0, 2) }}</td>
                <td>{{ number_format($nilaiRapot->calculateSemesterAverage(4) ?? 0, 2) }}</td>
                <td class="bg-light">{{ number_format($nilaiRapot->calculateSemesterAverage(5) ?? 0, 2) }}</td>
                <td>{{ number_format($nilaiRapot->calculateSemesterAverage(6) ?? 0, 2) }}</td>

                <!-- TOtal Nilai -->
                <td class="bg-light">{{ number_format($nilaiRapot->calculateTotalNilai(), 3) }}</td>

                <td>
                    <a href="{{ route('nilai.edit', $nilaiRapot->id_pendaftar) }}" class="btn btn-primary">Edit</a>
                  
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
