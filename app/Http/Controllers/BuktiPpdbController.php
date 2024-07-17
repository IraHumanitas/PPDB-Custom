<?php

namespace App\Http\Controllers;

use App\Models\BuktiPpdb;
use App\Models\Jalur;
use Illuminate\Http\Request;

class BuktiPpdbController extends Controller
{
    public function index(Request $request)
    {
        $buktiPpdbs = BuktiPpdb::when($request->search, function ($query) use ($request) {
            $query->where('bukti', 'LIKE', '%' . $request->search . '%');
        })->paginate(10);

        return view('operator.bukti-ppdb.index', compact('buktiPpdbs'));
    }

    public function create()
    {
        $jalurs = Jalur::all();
        return view('operator.bukti-ppdb.tambah', compact('jalurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Ukuran maksimum 2MB
            'id_jalur' => 'required|exists:jalur,id_jalur',
        ]);

        $bukti = $request->file('bukti');
        $buktiName = time() . '.' . $bukti->extension();
        $bukti->move(public_path('bukti_ppdb'), $buktiName);

        BuktiPpdb::create([
            'bukti' => $buktiName,
            'id_jalur' => $request->id_jalur,
        ]);

        return redirect()->route('bukti-ppdb.index')->with('success', 'Bukti PPDB berhasil ditambahkan!');
    }

    public function destroy(BuktiPpdb $buktiPpdb)
    {
        $buktiPpdb->delete();
        return redirect()->route('bukti-ppdb.index')->with('success', 'Bukti PPDB berhasil dihapus!');
    }
}
