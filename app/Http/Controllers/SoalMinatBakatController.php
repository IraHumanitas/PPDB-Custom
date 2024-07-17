<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalMinatBakat;

class MinatBakatController extends Controller
{
    public function index()
    {
        $minatBakats = SoalMinatBakat::all();
        return view('minat_bakat.index', compact('minatBakats'));
    }

    public function create()
    {
        return view('minat_bakat.create');
    }

    public function store(Request $request)
    {

        SoalMinatBakat::create($request->all());

        return redirect()->route('minatBakat.index')->with('success', 'Minat Bakat berhasil ditambahkan');
    }

    public function show($id)
    {
        $minatBakat = SoalMinatBakat::findOrFail($id);
        return view('minat_bakat.show', compact('minatBakat'));
    }

    public function edit($id)
    {
        $minatBakat = SoalMinatBakat::findOrFail($id);
        return view('minat_bakat.edit', compact('minatBakat'));
    }

    public function update(Request $request, $id)
    {

        $minatBakat = SoalMinatBakat::findOrFail($id);
        $minatBakat->update($request->all());

        return redirect()->route('minatBakat.index')->with('success', 'Minat Bakat berhasil diperbarui');
    }

    public function destroy($id)
    {
        $minatBakat = SoalMinatBakat::findOrFail($id);
        $minatBakat->delete();

        return redirect()->route('minatBakat.index')->with('success', 'Minat Bakat berhasil dihapus');
    }
}
