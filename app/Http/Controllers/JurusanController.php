<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\ProgramKeahlian;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        $kompetensi = ProgramKeahlian::all();
        
        return view('operator.jurusan', compact('jurusan','kompetensi'));
    }

    public function tambah()
    {
        $jurusan = Jurusan::all();
        $kompetensi = ProgramKeahlian::all();
        
        return view('operator.tambah-jurusan', compact('jurusan','kompetensi'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'singkatan' => 'required|max:6',
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|min:25',
            'id_kompetensi' => 'required',
        ], [
            'deskripsi.min' => 'Panjang deskripsi minimal 25 karakter.',
            'logo.max' => 'Ukuran foto melebihi batas 2MB.',
            'foto.max' => 'Ukuran foto melebihi batas 2MB.',
        ]);
        
        $jurusan = new Jurusan;
        $jurusan->nama = $request->nama;
        $jurusan->singkatan = $request->singkatan;
        $jurusan->deskripsi = $request->deskripsi;
        $jurusan->id_kompetensi = $request->id_kompetensi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/jurusan/foto';
            $file->move($tujuanupload, $namafile);
            $jurusan->foto = $namafile;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/jurusan/logo';
            $file->move($tujuanupload, $namafile);
            $jurusan->logo = $namafile;
        }

        $jurusan->save();
        
        return redirect('/super-admin/jurusan')->with('success','Jurusan baru telah ditambahkan');
    }

    public function hapus($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        
        return redirect('/super-admin/jurusan');
    }

    public function edit($idjurusan)
    {
        $jurusan = Jurusan::find($idjurusan);
        $kompetensi = ProgramKeahlian::all();
        
        return view('operator.edit-jurusan', compact('jurusan','kompetensi'));
    }


    public function update($idjurusan, Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'singkatan' => 'required|max:6',
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|min:25',
            'id_kompetensi' => 'required',
        ], [
            'deskripsi.min' => 'Panjang deskripsi minimal 25 karakter.',
            'logo.max' => 'Ukuran foto melebihi batas 2MB.',
            'foto.max' => 'Ukuran foto melebihi batas 2MB.',
        ]);
        
        $jurusan = Jurusan::find($idjurusan);

        $jurusan->nama = $request->nama;
        $jurusan->singkatan = $request->singkatan;
        $jurusan->deskripsi = $request->deskripsi;
        $jurusan->id_kompetensi = $request->id_kompetensi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/jurusan/foto';
            $file->move($tujuanupload, $namafile);
            $jurusan->foto = $namafile;
        }

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/jurusan/logo';
            $file->move($tujuanupload, $namafile);
            $jurusan->logo = $namafile;
        }
        $jurusan->save();
        
        return redirect('/super-admin/jurusan');
    }

    public function delete($idmobil)
    {
        $mobil = Jurusan::find($idmobil);
        $mobil->delete();
        
        return redirect('/super-admin/jurusan');
    }

    public function searchJurusan(Request $request)
    {
        $searchTerm = $request->input('search');
        $jurusan = Jurusan::where('nama', 'LIKE', '%' . $searchTerm . '%')->orWhere('singkatan', 'like', '%' . $searchTerm . '%')->get();

        return view('operator.jurusan', compact('jurusan'));
    }
}
