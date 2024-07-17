<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirPendaftaran;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\ProgramKeahlian;
use App\Models\Jalur;

use Carbon\Carbon;


class FormulirPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formulirPendaftaran = FormulirPendaftaran::all();
        return view('administrator.formulir.index', compact('formulirPendaftaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pendaftar = Pendaftar::all();
        $jalur = Jalur::all();
        $programKeahlian = ProgramKeahlian::all();
        $periode = Periode::all();

        return view('administrator.formulir.create', compact('pendaftar', 'jalur', 'programKeahlian', 'periode'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aktakelahiran' => 'file|mimes:pdf,jpeg,png|max:2048', 
            'kartukeluarga' => 'file|mimes:pdf,jpeg,png|max:2048',
            'skck' => 'file|mimes:pdf,jpeg,png|max:2048',
            'surat_lulus' => 'file|mimes:pdf,jpeg,png|max:2048',
            'alamat' => 'nullable'
        ], [
            'required' => 'Masukkan Data',
            'max' => 'File yang diUpload lebih dari 2 MB',
            'mimes' => 'Formt File hanyalah PDF, JPEG, dan PNG'
        ]);

        $pendaftar = Pendaftar::findOrFail($request->input('pendaftar_id'));

        if ($pendaftar->formulirPendaftaran) {
            return redirect()->back()->with('error', 'Formulir sudah terisi untuk pendaftar ini.');
        }

        $formulir = new FormulirPendaftaran();
        $formulir->nama = $pendaftar->nama;
        $formulir->nisn = $pendaftar->nisn;       
        $formulir->alamat = $request->input('alamat');


        if ($request->hasFile('aktakelahiran')) {
            $file = $request->file('aktakelahiran');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/akta-kelahiran'), $fileName);
            $formulir->aktakelahiran = $fileName;
        }

        if ($request->hasFile('kartukeluarga')) {
            $file = $request->file('kartukeluarga');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/kartu-keluarga'), $fileName);
            $formulir->aktakelahiran = $fileName;
        }

        if ($request->hasFile('skck')) {
            $file = $request->file('skck');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/skck'), $fileName);
            $formulir->aktakelahiran = $fileName;
        }

        if ($request->hasFile('surat-lulus')) {
            $file = $request->file('surat-lulus');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/surat-lulus'), $fileName);
            $formulir->aktakelahiran = $fileName;
        }

        $formulir->save();

        $pendaftar->formulirPendaftaran()->save($formulir);

        return redirect()->route('formulir-pendaftaran.index')->with('success', 'Formulir pendaftaran berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $formulir = FormulirPendaftaran::find($id);
        $pendaftar = Pendaftar::all();
        $jalur = Jalur::all();
        $programKeahlian = ProgramKeahlian::all();
        $periode = Periode::all();

        if (!$formulir) {
            return redirect()->route('formulir-pendaftaran.index')->with('error', 'Formulir pendaftaran tidak ditemukan.');
        }

        return view('administrator.formulir.show', compact('formulir', 'pendaftar', 'jalur', 'programKeahlian', 'periode'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formulir = FormulirPendaftaran::find($id);
        $pendaftar = Pendaftar::all();
        $jalurs = Jalur::all();
        $kompetensis  = ProgramKeahlian::all();
        $periodes = Periode::all();

        if (!$formulir) {
            return redirect()->route('formulir-pendaftaran.index')->with('error', 'Formulir pendaftaran tidak ditemukan.');
        }

        return view('administrator.formulir.edit', compact('formulir', 'pendaftar', 'jalurs', 'kompetensis', 'periodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formulir = FormulirPendaftaran::find($id);

        if (!$formulir) {
            return redirect()->route('formulir-pendaftaran.index')->with('error', 'Belum ada Pendaftar yang terdaftar');
        }

        $request->validate([
            'no_pendaftaran' => 'nullable',
            'skck' => 'file|mimes:pdf,jpeg,png|max:2048',
            'foto' => 'file|mimes:jpeg,png, jpg|max:2048',
            'surat_sehat' => 'file|mimes:pdf,jpeg,png, jpg|max:2048',
            'skhun' => 'file|mimes:pdf,jpeg,png, jpg|max:2048',
            'surat_lulus' => 'file|mimes:pdf,jpeg,png, jpg|max:2048',
            'alamat' => 'nullable',
            'id_jalur' => 'required',
            'id_keahlian' => 'required',
            'id_kompetensi' => 'required',
            'id_periode' => 'required',
            'jarak' => 'nullable',
            'bukti' => 'file|mimes:pdf,jpeg,png, jpg|max:2048',
            'bukti2' => 'nullable|file|mimes:pdf,jpeg,png, jpg|max:2048',
            'bukti3' => 'nullable|file|mimes:pdf,jpeg,png, jpg|max:2048',
            'bukti4' => 'nullable|file|mimes:pdf,jpeg,png, jpg|max:2048',
        ], [
            'required' => 'Masukkan Data',
            'max' => 'File yang diUpload lebih dari 2 MB',
            'mimes' => 'Formt File hanyalah PDF, JPEG, dan PNG'
        ]);
        

        if ($request->has('id_periode')) {
            $formulir->id_periode = $request->id_periode;
        }

        if ($request->has('id_keahlian')) {
            $formulir->id_keahlian = $request->id_keahlian;
        }

        if ($request->has('id_kompetensi')) {
            $formulir->id_kompetensi = $request->id_kompetensi;
        }

        if ($request->has('id_jalur')) {
            $formulir->id_jalur = $request->id_jalur;
        }


        //Foto dan File
        if ($request->hasFile('skck')) {
            $file = $request->file('skck');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/skck'), $fileName);
            $formulir->skck = $fileName;
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/foto'), $fileName);
            $formulir->foto = $fileName;
        }

        if ($request->hasFile('surat_sehat')) {
            $file = $request->file('surat_sehat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/surat_sehat'), $fileName);
            $formulir->surat_sehat = $fileName;
        }

        if ($request->hasFile('skhun')) {
            $file = $request->file('skhun');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/skhun'), $fileName);
            $formulir->skhun = $fileName;
        }

        if ($request->hasFile('surat_lulus')) {
            $file = $request->file('surat_lulus');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/surat_lulus'), $fileName);
            $formulir->surat_lulus = $fileName; // Perbaiki nama atribut menjadi surat_lulus
        }
        

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/bukti'), $fileName);
            $formulir->bukti = $fileName;
        }


        if ($request->hasFile('bukti2')) {
            $file = $request->file('bukti2');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/bukti'), $fileName);
            $formulir->bukti2 = $fileName;
        }

        if ($request->hasFile('bukti3')) {
            $file = $request->file('bukti3');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/pendaftar/bukti'), $fileName);
            $formulir->bukti3 = $fileName;
        }

        //Nomor pendaftaran
        $tahunPeriode = Periode::find($request->id_periode)->tahun;
        $idJalur = $request->id_jalur;
        $idKeahlian = $request->id_keahlian;
        $nomorRandom = mt_rand(10000, 99999); 

        $noPendaftaran = $tahunPeriode . '-' . $idJalur . '-' . $idKeahlian . '-' . $nomorRandom . '-MA';

        // Update nomor pendaftaran
        $formulir->no_pendaftaran = $noPendaftaran;

        $formulir->save();

        return redirect()->route('formulir-pendaftaran.index')->with('success', 'Formulir pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formulir = FormulirPendaftaran::find($id);

        if (!$formulir) {
            return redirect()->route('administrator.formulir.index')->with('error', 'Formulir pendaftaran tidak ditemukan.');
        }

        $formulir->delete();

        return redirect()->route('administrator.formulir.index')->with('success', 'Formulir pendaftaran berhasil dihapus.');
    }


    public function search(Request $request)
    {
        $keyword = $request->input('search'); // Ubah menjadi 'search'

        $formulirPendaftaran = FormulirPendaftaran::where('nama', 'like', '%' . $keyword . '%')
            ->get();

        return view('administrator.formulir.index', compact('formulirPendaftaran'));
    }

}
