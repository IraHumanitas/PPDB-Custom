<?php

namespace App\Imports;

use App\Models\UserPendaftar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UserImports implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key == 0) continue; 

            $userPendaftar = new UserPendaftar();
            $userPendaftar->nisn = $row[1];
            $userPendaftar->nik = $row[2];
            $userPendaftar->name = $row[0];
            $userPendaftar->token = rand(111111, 999999);
            $userPendaftar->password = bcrypt($userPendaftar->token);
            $userPendaftar->save();
        }
    }
}
