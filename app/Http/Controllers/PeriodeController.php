<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use Illuminate\Validation\Rule;


class PeriodeController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();
        return view('operator.periode.index', compact('periodes'));
    }

    public function create()
    {
        return view('operator.periode.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|integer',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'aktif' => 'required|in:Y,N',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus dalam format tanggal.',
            'in' => 'Kolom :attribute harus berisi Y atau N.',
            'after_or_equal' => 'Kolom :attribute harus setelah atau sama dengan Tanggal Buka.',
        ]);

        Periode::create($validatedData);
        return redirect()->route('periode.index');
    }

    public function show($id)
    {
        $periode = Periode::find($id);
        return view('operator.periode.show', compact('periode'));
    }

    public function edit($id)
    {
        $periode = Periode::find($id);
        return view('operator.periode.edit', compact('periode'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|integer',
            'tanggal_buka' => 'required|date',
            'tanggal_tutup' => 'required|date|after_or_equal:tanggal_buka',
            'aktif' => 'required|in:Y,N',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'date' => 'Kolom :attribute harus dalam format tanggal.',
            'in' => 'Kolom :attribute harus berisi Y atau N.',
            'after_or_equal' => 'Kolom :attribute harus setelah atau sama dengan Tanggal Buka.',
        ]);

        $periode = Periode::find($id);
        $periode->update($validatedData);
        return redirect()->route('periode.index');
    }

    public function destroy($id)
    {
        Periode::destroy($id);
        return redirect()->route('periode.index');
    }

    public function search(Request $request){
        $search = $request->input('search');
        
        $periodes = Periode::where('tahun', 'like', '%' . $search . '%')->get();

        return view('operator.periode.index', compact('periodes'));
    }


}
