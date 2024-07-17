<?php

namespace App\Http\Controllers;

use App\Models\AsalSekolah;
use Illuminate\Http\Request;

class AsalSekolahController extends Controller
{
    public function index()
    {
        $asalSekolahs = AsalSekolah::all();
        return view('operator.asal-sekolah.asal-sekolah', compact('asalSekolahs'));
    }

    public function create()
    {
        return view('operator.asal-sekolah.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:asal_sekolah',
        ]);

        AsalSekolah::create($request->all());
        return redirect()->route('asal-sekolah.index')
            ->with('success', 'Asal Sekolah added successfully');
    }

    public function destroy($id)
    {
        AsalSekolah::destroy($id);
        return redirect()->route('asal-sekolah.index')
            ->with('success', 'Asal Sekolah deleted successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $asalSekolahs = AsalSekolah::where('name', 'LIKE', '%' . $searchTerm . '%')->get();

        return view('operator.asal-sekolah.asal-sekolah', compact('asalSekolahs'));
    }

}
