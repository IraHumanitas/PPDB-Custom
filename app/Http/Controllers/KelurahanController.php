<?php

namespace App\Http\Controllers;

use App\Models\AsalKelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function asalKelurahan()
    {
        $asalKelurahans = AsalKelurahan::all();
        return view('operator.asal-kelurahan.index', compact('asalKelurahans'));
    }

    public function loadCreateAsalKelurahan()
    {
        return view('operator.asal-kelurahan.create');
    }

    public function createAsalKelurahan(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'jarak' => 'required|integer',
        ]);

        AsalKelurahan::create($request->all());

        return redirect()->route('asalKelurahan')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function editAsalKelurahan($id)
    {
        $asalKelurahan = AsalKelurahan::find($id);
        return view('operator.asal-kelurahan.edit', compact('asalKelurahan'));
    }

    public function updateAsalKelurahan(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'jarak' => 'required|integer',
        ]);

        $asalKelurahan = AsalKelurahan::find($id);
        $asalKelurahan->update($request->all());

        return redirect()->route('asalKelurahan')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteAsalKelurahan($id)
    {
        $asalKelurahan = AsalKelurahan::find($id);
        $asalKelurahan->delete();

        return redirect()->route('asalKelurahan')
            ->with('success', 'Data berhasil dihapus.');
    }

    public function searchAsalKelurahan(Request $request)
    {
        $search = $request->input('search');

        $asalKelurahans = AsalKelurahan::where('name', 'like', '%' . $search . '%')
            ->orWhere('jarak', 'like', '%' . $search . '%')
            ->get();

        return view('operator.asal-kelurahan.index', compact('asalKelurahans'));
    }


    public function sort(Request $request)
    {
        $column = $request->input('column');
        $order = $request->input('order');
        $asalKelurahans = AsalKelurahan::orderBy($column, $order)->get();

        return view('operator.asal-kelurahan.table-body', compact('asalKelurahans'));
    }
}
