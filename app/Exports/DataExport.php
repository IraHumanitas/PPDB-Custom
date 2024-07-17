<?php

// app/Exports/DataExport.php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;

class DataExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Exclude users with role 1
        $data =  User::select('name', 'token', 'role')->where('role', '!=', 4)->get();

        $exportData = [];

        foreach ($data as $row) {
            $roleText = '';
            switch ($row->role) {
                case 0:
                    $roleText = 'Operator';
                    break;
                case 1:
                    $roleText = 'Verifikator';
                    break;
                case 2:
                    $roleText = 'Informasi';
                    break;
                case 3:
                    $roleText = 'Administrator';
                    break;
                
                default:
                    $roleText = 'Kamu adalah Anomali';
            }

            $exportData[] = [
                $row->id,
                $row->name,
                $row->token,
                $roleText,
            ];
        }

        return collect($exportData);

    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Password', 'Role'];
    }


}
