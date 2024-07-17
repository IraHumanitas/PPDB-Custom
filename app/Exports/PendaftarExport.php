<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\UserPendaftar;

class PendaftarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = UserPendaftar::select('id', 'name','nisn', 'token')->get();
        $exportData = [];

        foreach ($data as $row) {
            $exportData[] = [
                $row->id,
                $row->name,
                $row->nisn,
                $row->token,

            ];
        }

        return collect($exportData);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NISN',
            'Token',
        ];
    }
}
