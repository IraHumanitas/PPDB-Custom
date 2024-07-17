<?php

namespace App\Http\Controllers;
use App\Models\InformasiPPDB;
use App\Models\User;
use App\Models\InformasiSekolah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function dashboard()
    {
        return view('informasi.dashboard');
    }

    public function informasiPPDB(){
        $informasi = InformasiPPDB::all();
    
        // Iterasi setiap informasi
        foreach ($informasi as $info) {
            if (strlen($info->deskripsi) > 50) {
                $info->deskripsi = substr($info->deskripsi, 0, 50) . '... Lihat Selengkapnya';
            }
    
            // Pengolahan slider
            if ($info->slider === 0) {
                $info->slider_pesan = 'Tidak';
            } elseif ($info->slider == 1) {
                $info->slider_pesan = 'Ya';
            } else {
                $info->slider_pesan = '-';
            }
        }
    
        return view('informasi.informasi', compact('informasi'));
    }
    
    public function searchPPDB(Request $request)
    {
        $search = $request->input('search');

        $informasi = InformasiPPDB::where('judul', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%')
            ->get();

        return view('informasi.informasi', compact('informasi'));
    }


    public function loadCreateInformasiPPDB()
    {
        return view('informasi.tambah-informasi');
    }


    public function createInformasiPPDB(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,jfif',
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),    
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:204800',   
            'checkbox' => 'required'

        ], [
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, atau jfif.',
            'judul.required' => 'Judul wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal harus dalam format yang valid.',
            'date.before_or_equal' => 'Tanggal harus sebelum atau sama dengan tanggal hari ini.',
            'video.mimes' => 'Video harus berformat mp4, mov, avi, atau wmv.',
            'video.max' => 'Ukuran video tidak boleh lebih dari 200 MB.',
    
        ]);
    
        $info = new InformasiPPDB;
        $info->judul = $request->judul;
        $info->deskripsi = $request->deskripsi;
        $info->date = $request->date;

        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/informasi';
            $file->move($tujuanupload, $namafile);
            $info->foto = $namafile;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'video/informasi';
            $file->move($tujuanupload, $namafile);
            $info->video = $namafile;
        }

        if ($request->has('checkbox') && $request->input('checkbox') === 'checkbox_value') {
            $info->checkbox = 1;
        } else {
            $info->checkbox = 0;
        }
    
        $info->save();
    
        return back()->with('success','Informasi baru telah ditambahkan');
    }


    public function deleteInformasiPPDB($id){
        $informasi = InformasiPPDB::find($id);

        if (!$informasi) {
            return redirect('/admin/informasi/ppdb')->with('error', 'Informasi yang dimaksud tidak ditemukan.');
        }

        $informasi->delete();

        return redirect('/admin/informasi/ppdb')->with('success', 'Pengguna berhasil dihapus.');
    }
    
    public function editPPDB($id)
    {
        $informasi = InformasiPPDB::find($id);
        return view('informasi.edit-informasi', ['informasi' => $informasi]);
    }

    public function updatePPDB($id, Request $request)
    {
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:204800',
        ]);

        $informasi = InformasiPPDB::find($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $tujuan_upload = public_path('gambar/informasi');
            $filename = $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            $informasi->foto = $filename;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $tujuan_upload = public_path('video/informasi');
            $filename = $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            $informasi->video = $filename;
        }

        if ($request->has('checkbox')) {
            $informasi->checkbox = 1;
        } else {
            $informasi->checkbox = 0;
        }

        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->date = $request->date;
        $informasi->save();

        return redirect('/admin/informasi/ppdb');
    }



    //Informasi Sekolah
    public function informasiSekolah(){
        $informasi = InformasiSekolah::all();
    
        // Iterasi setiap informasi
        foreach ($informasi as $info) {
            if (strlen($info->deskripsi) > 50) {
                $info->deskripsi = substr($info->deskripsi, 0, 50) . '... Lihat Selengkapnya';
            }
    
            // Pengolahan slider
            if ($info->slider === 0) {
                $info->slider_pesan = 'Tidak';
            } elseif ($info->slider == 1) {
                $info->slider_pesan = 'Ya';
            } else {
                $info->slider_pesan = '-';
            }
        }
    
        return view('informasi.informasi-sekolah.informasi', compact('informasi'));
    }
    
    public function searchSekolah(Request $request)
    {
        $search = $request->input('search');

        $informasi = InformasiSekolah::where('judul', 'like', '%' . $search . '%')
            ->orWhere('deskripsi', 'like', '%' . $search . '%')
            ->get();

        return view('informasi.informasi-sekolah.informasi', compact('informasi'));
    }


    public function loadCreateInformasiSekolah()
    {
        return view('informasi.informasi-sekolah.tambah-informasi');
    }


    public function createInformasiSekolah(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,jfif',
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),    
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:204800',   
            'checkbox' => 'required'

        ], [
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'Foto harus berupa file gambar.',
            'foto.mimes' => 'Foto harus berformat jpeg, png, jpg, atau jfif.',
            'judul.required' => 'Judul wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal harus dalam format yang valid.',
            'date.before_or_equal' => 'Tanggal harus sebelum atau sama dengan tanggal hari ini.',
            'video.mimes' => 'Video harus berformat mp4, mov, avi, atau wmv.',
            'video.max' => 'Ukuran video tidak boleh lebih dari 200 MB.',
    
        ]);
    
        $info = new InformasiSekolah;
        $info->judul = $request->judul;
        $info->deskripsi = $request->deskripsi;
        $info->date = $request->date;

        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'gambar/informasi';
            $file->move($tujuanupload, $namafile);
            $info->foto = $namafile;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $namafile = time() . "_" . $file->getClientOriginalName();
            $tujuanupload = 'video/informasi';
            $file->move($tujuanupload, $namafile);
            $info->video = $namafile;
        }

        if ($request->has('checkbox') && $request->input('checkbox') === 'checkbox_value') {
            $info->checkbox = 1;
        } else {
            $info->checkbox = 0;
        }
    
        $info->save();
    
        return back()->with('success','Informasi baru telah ditambahkan');
    }


    public function deleteInformasiSekolah($id){
        $informasi = InformasiSekolah::find($id);

        if (!$informasi) {
            return redirect('/admin/informasi/sekolah')->with('error', 'Informasi yang dimaksud tidak ditemukan.');
        }

        $informasi->delete();

        return redirect('/admin/informasi/sekolah')->with('success', 'Pengguna berhasil dihapus.');
    }
    
    public function editSekolah($id)
    {
        $informasi = InformasiSekolah::find($id);
        return view('informasi.informasi-sekolah.edit-informasi', ['informasi' => $informasi]);
    }

    public function updateSekolah($id, Request $request)
    {
        $this->validate($request, [
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:204800',
        ]);

        $informasi = InformasiSekolah::find($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $tujuan_upload = public_path('gambar/informasi');
            $filename = $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            $informasi->foto = $filename;
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $tujuan_upload = public_path('video/informasi');
            $filename = $file->getClientOriginalName();
            $file->move($tujuan_upload, $filename);
            $informasi->video = $filename;
        }

        if ($request->has('checkbox')) {
            $informasi->checkbox = 1;
        } else {
            $informasi->checkbox = 0;
        }

        $informasi->judul = $request->judul;
        $informasi->deskripsi = $request->deskripsi;
        $informasi->date = $request->date;
        $informasi->save();

        return redirect('/admin/informasi/sekolah');
    }


}
