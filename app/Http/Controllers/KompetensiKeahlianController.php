<?php

namespace App\Http\Controllers;

use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class KompetensiKeahlianController extends Controller
{
    public function index()
    {
        $kompetensi = ProgramKeahlian::all();
        
        return view('operator.kompetensi-keahlian', compact('kompetensi'));
    }

    public function tambah(){
        $kompetensi = ProgramKeahlian::all();
        
        return view('operator.tambah-kompetensi-keahlian', compact('kompetensi'));
    }

    public function simpan(Request $request)
    {
        $this->validate($request,[
            'nama_program' => 'required',
            'singkatan' => 'required|max:6|max:300',
            'pelajaran' => 'required|min:25|max:300',
            'deskripsi' => 'required|min:25|max:300',
            'kuota' => 'required|integer|max:300|min:100',
            'program' => 'required|min:25',
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'deskripsi.min' => 'Panjang deskripsi minimal 25 karakter.',
            'program.min' => 'Panjang deskripsi minimal 25 karakter.',
            'pelajaran.min' => 'Panjang deskripsi minimal 25 karakter.',
            'singkatan.max' => 'Panjang singkatan maksimal 6 karakter.',
            'kuota.max' => 'Kuota maksimal hanya 300 pendaftar.',
            'kuota.min' => 'Kuota minimal 100 pendaftar.',
            'foto.max' => 'Ukuran foto melebihi batas 2MB.',
            'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
        ]);
        
        $kejuruan = new ProgramKeahlian;
        $kejuruan->nama_program = $request->nama_program;
        $kejuruan->singkatan = $request->singkatan;
        $kejuruan->deskripsi = $request->deskripsi;
        $kejuruan->pelajaran = $request->pelajaran;
        $kejuruan->program = $request->program;
        $kejuruan->kuota = $request->kuota;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/kompetensi-keahlian';
            $file->move($tujuanupload, $namafile);
            $kejuruan->foto = $namafile;
        }

        $kejuruan->save();
        
        return redirect('/super-admin/kompetensi-keahlian')->with('success','Kompetensi Keahlian baru telah ditambahkan');
    }

    public function hapus($idkompetensikeahlian)
    {
        $jurusan = ProgramKeahlian::find($idkompetensikeahlian);
        $jurusan->delete();
        
        return redirect('/super-admin/kompetensi-keahlian');
    }

    public function edit($idkompetensikeahlian)
    {
        $kompetensi = ProgramKeahlian::find($idkompetensikeahlian);
        
        return view('operator.edit-kompetensi-keahlian', compact('kompetensi'));
    }


    public function update($idkompetensikeahlian, Request $request)
    {
        $this->validate($request,[
            'nama_program'  => 'required',
            'singkatan'     => 'required|max:6',
            'pelajaran'     => 'required|min:25',
            'deskripsi'     => 'required|min:25',
            'kuota'         => 'required|integer|max:300|min:100',
            'program'       => 'required|min:25',
            'foto'          => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'deskripsi.min' => 'Panjang deskripsi minimal 25 karakter.',
            'program.min'   => 'Panjang deskripsi minimal 25 karakter.',
            'pelajaran.min' => 'Panjang deskripsi minimal 25 karakter.',
            'singkatan.max' => 'Panjang singkatan maksimal 6 karakter.',
            'kuota.max'     => 'Kuota maksimal hanya 300 pendaftar.',
            'kuota.min'     => 'Kuota minimal 100 pendaftar.',
            'foto.max'      => 'Ukuran foto melebihi batas 2MB.',
        ]);
        
        $kejuruan = ProgramKeahlian::find($idkompetensikeahlian
    );

        $kejuruan->nama_program = $request->nama_program;
        $kejuruan->singkatan = $request->singkatan;
        $kejuruan->deskripsi = $request->deskripsi;
        $kejuruan->pelajaran = $request->pelajaran;
        $kejuruan->program = $request->program;
        $kejuruan->kuota = $request->kuota;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/kompetensi-keahlian';
            $file->move($tujuanupload, $namafile);
            $kejuruan->foto = $namafile;
        }

        $kejuruan->save();
        
        return redirect('/super-admin/kompetensi-keahlian')->with('success','Data Kompetensi Keahlian telah diubah');
    }

    public function delete($idkompetensikeahlian)
    {
        $mobil = ProgramKeahlian::find($idkompetensikeahlian);
        $mobil->delete();
        
        return redirect('/super-admin/kompetensi-keahlian');
    }

    public function searchKompetensiKeahlian(Request $request)
    {
        $searchTerm = $request->input('search');
        $kompetensi = ProgramKeahlian::where('nama_program', 'LIKE', '%' . $searchTerm . '%')
                                    ->orWhere('singkatan', 'like', '%' . $searchTerm . '%')
                                    ->get();

        return view('operator.kompetensi-keahlian', compact('kompetensi'));
    }
}
