<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jalur;

class JalurController extends Controller
{
    public function index()
    {
        $jalurs = Jalur::all();
        return view('operator.jalur.index', compact('jalurs'));
    }

    public function create()
    {
        return view('operator.jalur.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jalur' => 'required',
            'deskripsi' => 'required',
            'kuota' => 'required|numeric',
        ], [
            'nama_jalur.required' => 'Nama jalur wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
        ]);

        Jalur::create($request->all());

        return redirect()->route('jalur.index')
            ->with('success', 'Jalur berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jalur = Jalur::find($id);
        return view('operator.jalur.edit', compact('jalur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jalur' => 'required',
            'deskripsi' => 'required',
            'kuota' => 'required|numeric',
        ], [
            'nama_jalur.required' => 'Nama jalur wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'kuota.required' => 'Kuota wajib diisi.',
            'kuota.numeric' => 'Kuota harus berupa angka.',
        ]);

        Jalur::find($id)->update($request->all());

        return redirect()->route('jalur.index')
            ->with('success', 'Jalur berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Jalur::find($id)->delete();
        
        return redirect()->route('jalur.index')
            ->with('success', 'Jalur berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $jalurs = Jalur::where('nama_jalur', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%')
                        ->orWhere('kuota', 'like', '%' . $search . '%')
                        ->get();

        return view('operator.jalur.index', compact('jalurs'));
    }
}
