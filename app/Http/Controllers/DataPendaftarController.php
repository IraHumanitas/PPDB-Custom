<?php

namespace App\Http\Controllers;

use App\Models\AsalKelurahan;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\AsalSekolah;
use App\Models\AsalKota;

class DataPendaftarController extends Controller
{
    public function index(){
        $pendaftars = Pendaftar::with('asalSekolah')->get(); 
        $asalSekolah = AsalSekolah::all(); 
    
        $errors = [];
    
        foreach ($pendaftars as $pendaftar) {
            if (empty($pendaftar->nama)) {
                $errors[$pendaftar->id][] = "Silakan isi kolom nama.";
            }
            if (empty($pendaftar->nik)) {
                $errors[$pendaftar->id][] = "Silakan isi kolom nik.";
            }
            if (empty($pendaftar->asalSekolah) || empty($pendaftar->asalSekolah->name)) {
                $errors[$pendaftar->id][] = "Belum terisi";
            }
        }
    
        return view('administrator.pendaftar.index', compact('pendaftars', 'asalSekolah', 'errors'));
    }


    public function create()
    {
        $asalSekolah = AsalSekolah::all();
        $asalKota = AsalKota::all();
        return view('administrator.pendaftar.tambah', compact('asalSekolah', 'asalKota'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'id_login' => 'required|exists:user_pendaftar,id',
            'nama' => 'required|unique:user_pendaftar,nama|unique:pendaftar,nama',
            'nisn' => 'required|unique:user_pendaftar,nisn|unique:pendaftar,nisn',
            'nik' => 'required|unique:user_pendaftar,nik|unique:pendaftar,nik',
            'tempat_lahir' => 'required|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'anak_ke' => 'required|integer',
            'jumlah_saudara' => 'required|integer',
            'agama' => 'required|max:15',
            'hp' => 'required|max:18',
            'alamat' => 'nullable',
            'kelurahan' => 'nullable|max:50',
            'kecamatan' => 'nullable|max:50',
            'id_asal_kota' => 'required|exists:asal_kota,id',
            'aktakelahiran' => 'required',
            'kartukeluarga' => 'required',
            'no_kk' => 'required',
            'alamat_ortu' => 'required',
            'alamat_wali' => 'required',
            'provinsi' => 'nullable|max:50',
            'kode_pos' => 'nullable|max:5',
            'nama_ayah' => 'required|max:100',
            'nik_ayah' => 'required|max:50',
            'pekerjaan_ayah' => 'required|max:50',
            'hp_ayah' => 'required|max:18',
            'nama_ibu' => 'required|max:100',
            'nik_ibu' => 'required|max:50',
            'pekerjaan_ibu' => 'required|max:50',
            'hp_ibu' => 'required|max:18',
            'nama_wali' => 'nullable|max:100|nullable',
            'nik_wali' => 'nullable|max:50|nullable',
            'pekerjaan_wali' => 'nullable|max:50|nullable',
            'hp_wali' => 'nullable|max:15|nullable',
            'id_asal_sekolah' => 'required|exists:asal_sekolah,id',
            'tahun_lulus' => 'required|integer',
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'unique' => 'Kolom :attribute sudah ada dalam database.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
            'in' => 'Kolom :attribute harus diisi dengan L (Laki-laki) atau P (Perempuan).',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
            'exists' => 'Nilai yang dipilih untuk kolom :attribute tidak valid.',
        ]);

        $pendaftar = new Pendaftar(); 
        $pendaftar->tempat_lahir = $request->tempat_lahir;
        $pendaftar->tanggal_lahir = $request->tanggal_lahir;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->anak_ke = $request->anak_ke;
        $pendaftar->jumlah_saudara = $request->jumlah_saudara;
        $pendaftar->agama = $request->agama;
        $pendaftar->hp = $request->hp;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->kelurahan = $request->kelurahan;
        $pendaftar->kecamatan = $request->kecamatan;
        $pendaftar->id_asal_kota = $request->id_asal_kota;
        $pendaftar->aktakelahiran = $request->aktakelahiran;
        $pendaftar->kartukeluarga = $request->kartukeluarga;
        $pendaftar->no_kk = $request->no_kk;
        $pendaftar->alamat_ortu = $request->alamat_ortu;
        $pendaftar->alamat_wali = $request->alamat_wali;
        $pendaftar->provinsi = $request->provinsi;
        $pendaftar->kode_pos = $request->kode_pos;
        $pendaftar->nama_ayah = $request->nama_ayah;
        $pendaftar->nik_ayah = $request->nik_ayah;
        $pendaftar->pekerjaan_ayah = $request->pekerjaan_ayah;
        $pendaftar->hp_ayah = $request->hp_ayah;
        $pendaftar->nama_ibu = $request->nama_ibu;
        $pendaftar->nik_ibu = $request->nik_ibu;
        $pendaftar->pekerjaan_ibu = $request->pekerjaan_ibu;
        $pendaftar->hp_ibu = $request->hp_ibu;
        $pendaftar->nama_wali = $request->nama_wali;
        $pendaftar->nik_wali = $request->nik_wali;
        $pendaftar->pekerjaan_wali = $request->pekerjaan_wali;
        $pendaftar->hp_wali = $request->hp_wali;
        $pendaftar->id_asal_sekolah = $request->id_asal_sekolah;
        $pendaftar->tahun_lulus = $request->tahun_lulus;

        if ($request->hasFile('aktakelahiran')) {
            $file = $request->file('aktakelahiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'gambar/pendaftar/akta-kelahiran'; 
            $file->move($destinationPath, $fileName);
            $pendaftar->aktakelahiran = $fileName;
        }

        if ($request->hasFile('kartukeluarga')) {
            $file = $request->file('kartukeluarga');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'gambar/pendaftar/kartu-keluarga'; 
            $file->move($destinationPath, $fileName);
            $pendaftar->kartukeluarga = $fileName;
        }

        $pendaftar->save();

        return redirect('/pendaftar');
    }


    public function show($id)
    {
        $pendaftar = Pendaftar::with('asalSekolah')->findOrFail($id);
        $asal_sekolah = AsalSekolah::all(); 
        return view('administrator.pendaftar.show', compact('pendaftar', 'asal_sekolah'));
    }


    public function edit($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $asalSekolah = AsalSekolah::all();
        $asalKota = AsalKota::all();
        $asalKelurahan = AsalKelurahan::all();
        return view('administrator.pendaftar.edit', compact('pendaftar', 'asalSekolah', 'asalKota', 'asalKelurahan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tempat_lahir' => 'max:50',
            'tanggal_lahir' => 'date',
            'jenis_kelamin' => 'in:L,P',
            'anak_ke' => 'integer',
            'jumlah_saudara' => 'integer',
            'agama' => 'max:15',
            'hp' => 'max:18',
            'kelurahan' => 'max:50',
            'kecamatan' => 'max:50',
            'id_asal_kota' => 'exists:asal_kota,id',
            'id_asal_kelurahan' => 'exists:asal_kelurahan,id',
            'provinsi' => 'max:50',

            'aktakelahiran' => 'mimes:pdf,png,jpeg,jpg,doc',
            'kartukeluarga' => 'mimes:pdf,png,jpeg,jpg,doc',            
            'kode_pos' => 'max:5',
            'nama_ayah' => 'max:100',
            'nik_ayah' => 'max:50',
            'pekerjaan_ayah' => 'max:50',
            'hp_ayah' => 'max:18',
            'nama_ibu' => 'max:100',
            'nik_ibu' => 'max:50',
            'pekerjaan_ibu' => 'max:50',
            'hp_ibu' => 'max:18',
            'nama_wali' => 'max:100|nullable',
            'nik_wali' => 'max:50|nullable',
            'pekerjaan_wali' => 'max:50|nullable',
            'hp_wali' => 'max:15|nullable',
            'id_asal_sekolah' => 'exists:asal_sekolah,id',
            'tahun_lulus' => 'integer',
           
        ], [
            'required' => 'Kolom :attribute wajib diisi.',
            'unique' => 'Kolom :attribute sudah ada dalam database.',
            'date' => 'Kolom :attribute harus berupa tanggal.',
            'in' => 'Kolom :attribute harus diisi dengan L (Laki-laki) atau P (Perempuan).',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'max' => 'Kolom :attribute tidak boleh melebihi :max karakter.',
            'exists' => 'Nilai yang dipilih untuk kolom :attribute tidak valid.',
            'mimes' => 'The :attribute must be a file of type: :values.',

         
        ]);

        $pendaftar = Pendaftar::find($id);

        $pendaftar->tempat_lahir = $request->tempat_lahir;
        $pendaftar->tanggal_lahir = $request->tanggal_lahir;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->anak_ke = $request->anak_ke;
        $pendaftar->jumlah_saudara = $request->jumlah_saudara;
        $pendaftar->agama = $request->agama;
        $pendaftar->hp = $request->hp;
        $pendaftar->alamat = $request->alamat;
        $pendaftar->id_asal_kelurahan = $request->id_asal_kelurahan;
        $pendaftar->kecamatan = $request->kecamatan;
        $pendaftar->id_asal_kota = $request->id_asal_kota;
        $pendaftar->aktakelahiran = $request->aktakelahiran;
        $pendaftar->kartukeluarga = $request->kartukeluarga;
        $pendaftar->no_kk = $request->no_kk;
        $pendaftar->alamat_ortu = $request->alamat_ortu;
        $pendaftar->alamat_wali = $request->alamat_wali;
        $pendaftar->provinsi = $request->provinsi;
        $pendaftar->kode_pos = $request->kode_pos;
        $pendaftar->nama_ayah = $request->nama_ayah;
        $pendaftar->nik_ayah = $request->nik_ayah;
        $pendaftar->pekerjaan_ayah = $request->pekerjaan_ayah;
        $pendaftar->hp_ayah = $request->hp_ayah;
        $pendaftar->nama_ibu = $request->nama_ibu;
        $pendaftar->nik_ibu = $request->nik_ibu;
        $pendaftar->pekerjaan_ibu = $request->pekerjaan_ibu;
        $pendaftar->hp_ibu = $request->hp_ibu;
        $pendaftar->nama_wali = $request->nama_wali;
        $pendaftar->nik_wali = $request->nik_wali;
        $pendaftar->pekerjaan_wali = $request->pekerjaan_wali;
        $pendaftar->hp_wali = $request->hp_wali;
        $pendaftar->id_asal_sekolah = $request->id_asal_sekolah;
        $pendaftar->tahun_lulus = $request->tahun_lulus;

        if ($request->hasFile('aktakelahiran')) {
            $file = $request->file('aktakelahiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'gambar/pendaftar/akta-kelahiran'; 
            $file->move($destinationPath, $fileName);
            $pendaftar->aktakelahiran = $fileName;
        }
        
        if ($request->hasFile('kartukeluarga')) {
            $file = $request->file('kartukeluarga');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'gambar/pendaftar/kartu-keluarga'; 
            $file->move($destinationPath, $fileName);
            $pendaftar->kartukeluarga = $fileName;
        }
        
        $pendaftar->save();
    
        return redirect()->route('userpendaftar.index')->with('success', 'Data pendaftar berhasil diperbarui');
    }
    

    public function destroy($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->delete();

        return redirect()->route('userpendaftar.index')->with('success', 'Data pendaftar berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $pendaftars = Pendaftar::where('nama', 'LIKE', "%$search%")
            ->orWhere('nik', 'LIKE', "%$search%")
            ->get();

        return view('administrator.pendaftar.index', compact('pendaftars'));
    }
}
