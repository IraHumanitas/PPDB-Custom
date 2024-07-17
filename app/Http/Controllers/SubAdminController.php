<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirPendaftaran;


class SubAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('verifikator.dashboard');
    }

    public function pendaftar()
    {
        $formulirPendaftaran = FormulirPendaftaran::all();
        return view('verifikator.pendaftar.index', compact('formulirPendaftaran'));
    }
}
