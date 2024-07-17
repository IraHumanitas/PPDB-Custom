<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserPendaftar;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UserImports;

class UserController extends Controller
{
    
    public function dashboard()
    {
        return view('administrator.dashboard');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('excel_file');

        Excel::import(new UserImports, $file);

        return redirect()->back()->with('success', 'Data from Excel has been imported successfully.');
    }
}
