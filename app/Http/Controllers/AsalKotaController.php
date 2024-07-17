<?php

namespace App\Http\Controllers;

use App\Models\AsalKota;
use Illuminate\Http\Request;

class AsalKotaController extends Controller
{
    public function index()
    {
        $asalKotas = AsalKota::all();
        return view('operator.asal-kota.asal-kota', compact('asalKotas'));
    }

    public function create()
    {
        return view('operator.asal-kota.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:asal_kota',
        ], [
            'name.unique' => 'Kota yang ditambahkan telah ada',
        ]);

        AsalKota::create($request->all());

        return redirect()->route('asal-kota.index')
            ->with('success', 'Data asal kota berhasil ditambahkan');
    }

    public function destroy(AsalKota $asalKota)
    {
        $asalKota->delete();

        return redirect()->route('asal-kota.index')
            ->with('success', 'Data asal kota berhasil dihapus');
    }

    public function search(Request $request){
        $searchTerm = $request->input('search');
        $asalKotas = AsalKota::where('name', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('operator.asal-kota.asal-kota', compact('asalKotas'));
    }

}
