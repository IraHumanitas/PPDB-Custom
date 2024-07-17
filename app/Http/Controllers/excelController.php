<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Exports\PendaftarExport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportToExcel()
    {
        if (auth()->check()) {
            $data = User::select('name', 'token', 'password', 'role')
                ->whereIn('role', [0, 2, 3])
                ->get();

            return Excel::download(new DataExport($data), 'PanitiaPPDB.xlsx');
        }

    }

    public function exportPendaftar()
    {
        return Excel::download(new PendaftarExport, 'pendaftar.xlsx');
    }

    public function exportNilai()
    {
        return Excel::download(new PendaftarExport, 'pendaftar.xlsx');
    }

    public function importNilai()
    {
        return Excel::download(new PendaftarExport, 'pendaftar.xlsx');
    }

}





