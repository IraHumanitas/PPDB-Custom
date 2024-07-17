<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\UserPendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendaftarController extends Controller
{
    public function index()
    {
        $users = UserPendaftar::all();
        return view('asalsekolah.pendaftar.index', compact('users'));
    }

    public function create()
    {
        return view('asalsekolah.pendaftar.create');
    }

    public function show($id)
    {
        $user = UserPendaftar::findOrFail($id);
        return view('asalsekolah.pendaftar.show', compact('user'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:user_pendaftar,name',
            'username' => 'nullable|unique:user_pendaftar,username',
            'nisn' => 'required|unique:user_pendaftar,nisn',
            'nik' => 'required|unique:user_pendaftar,nik',
        ], [
            'unique' => 'Kolom :attribute sudah pernah di masukkan',
            'required' => 'Kolom :attribute wajib diisi.',
        ]);

        $randomValue = rand(10000, 99999);
        $isi = "AM" . $randomValue;

        $user = new UserPendaftar();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->nik = $request->nik;
        $user->nisn = $request->nisn;

        $user->password = Hash::make($isi);
        $user->token = $isi;
        $user->save(); 

        $users = UserPendaftar::all();
      
        return redirect()->route('pendaftar.index')
            ->with('success', 'Data Pendaftar berhasil ditambahkan');
       
    }

    public function edit($id)
    {
        $user = UserPendaftar::findOrFail($id);
        return view('asalsekolah.pendaftar.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:user_pendaftar,name',
            'username' => 'nullable|unique:user_pendaftar,username',
            'nisn' => 'required|unique:user_pendaftar,nisn',
            'nik' => 'required|unique:user_pendaftar,nik',
        ], [
            'unique' => 'Kolom :attribute sudah pernah di masukkan',
            'required' => 'Kolom :attribute wajib diisi.',
        ]);

        UserPendaftar::whereId($id)->update($validatedData);

        return redirect()->route('pendaftar.index')
        ->with('succesUpdate', 'Data Panitia berhasil diubah');
    }

    public function destroy($id)
    {
        UserPendaftar::findOrFail($id)->delete();

        return redirect()->route('pendaftar.index')
        ->with('succesDelete', 'Data Panitia berhasil di Hapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $users = UserPendaftar::where('name', 'like', '%' . $search . '%')
            ->orWhere('nisn', 'like', '%' . $search . '%')
            ->orWhere('nik', 'like', '%' . $search . '%')
            ->get();
        
        return view('asalsekolah.pendaftar.index', compact('users'));
    }

}
