<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SMPController extends Controller
{
    //
    public function dashboard()
    {
        return view('asalsekolah.dashboard');
    }
}
