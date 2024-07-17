<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiRapot;
use App\Models\Semester1;
use App\Models\Semester2;
use App\Models\Semester3;
use App\Models\Semester4;
use App\Models\Semester5;
use App\Models\Semester6;

class NilaiRapotController extends Controller
{
    public function index()
    {
        $nilaiRapots = NilaiRapot::all();
        return view('asalsekolah.nilai.index', compact('nilaiRapots'));
    }

    public function edit($id)
    {
        // Ambil data nilai rapot berdasarkan ID
        $nilaiRapotS1 = Semester1::where('id_pendaftar', $id)->first();

        $nilaiRapotS2 = Semester2::where('id_pendaftar', $id)->first();

        $nilaiRapotS3 = Semester3::where('id_pendaftar', $id)->first();

        $nilaiRapotS4 = Semester4::where('id_pendaftar', $id)->first();
        
        $nilaiRapotS5 = Semester5::where('id_pendaftar', $id)->first();
        $nilaiRapotS6 = Semester6::where('id_pendaftar', $id)->first();

        // Jika data tidak ditemukan, redirect atau tampilkan pesan error
        if (!$nilaiRapotS1 || !$nilaiRapotS2 || !$nilaiRapotS3 || !$nilaiRapotS4 || !$nilaiRapotS5 || !$nilaiRapotS6) {
        }

        $nilai = NilaiRapot::findOrFail($id);

        return view('asalsekolah.nilai.edit', compact('nilai', 'nilaiRapotS1', 'nilaiRapotS2', 'nilaiRapotS3', 'nilaiRapotS4', 'nilaiRapotS5', 'nilaiRapotS6'));
    }

    public function update(Request $request, $id_pendaftar)
    {
        // Validasi request
        $request->validate([
            // Aturan validasi untuk setiap field nilai
            'nilai_agama_s1' => 'required|numeric',
            'nilai_indonesia_s1' => 'required|numeric',
            'nilai_mtk_s1' => 'required|numeric',
            'nilai_inggris_s1' => 'required|numeric',
            'nilai_pjok_s1' => 'required|numeric',
            'nilai_ipa_s1' => 'required|numeric',
            'nilai_ips_s1' => 'required|numeric',
            'nilai_pkn_s1' => 'required|numeric',
            'nilai_komputer_s1' => 'required|numeric',
            'nilai_sunda_s1' => 'required|numeric',
            'nilai_seni_s1' => 'required|numeric',

            'nilai_agama_s2' => 'required|numeric',
            'nilai_indonesia_s2' => 'required|numeric',
            'nilai_mtk_s2' => 'required|numeric',
            'nilai_inggris_s2' => 'required|numeric',
            'nilai_pjok_s2' => 'required|numeric',
            'nilai_ipa_s2' => 'required|numeric',
            'nilai_ips_s2' => 'required|numeric',
            'nilai_pkn_s2' => 'required|numeric',
            'nilai_komputer_s2' => 'required|numeric',
            'nilai_sunda_s2' => 'required|numeric',
            'nilai_seni_s2' => 'required|numeric',

            'nilai_agama_s3' => 'required|numeric',
            'nilai_indonesia_s3' => 'required|numeric',
            'nilai_mtk_s3' => 'required|numeric',
            'nilai_inggris_s3' => 'required|numeric',
            'nilai_pjok_s3' => 'required|numeric',
            'nilai_ipa_s3' => 'required|numeric',
            'nilai_ips_s3' => 'required|numeric',
            'nilai_pkn_s3' => 'required|numeric',
            'nilai_komputer_s3' => 'required|numeric',
            'nilai_sunda_s3' => 'required|numeric',
            'nilai_seni_s3' => 'required|numeric',

            'nilai_agama_s4' => 'required|numeric',
            'nilai_indonesia_s4' => 'required|numeric',
            'nilai_mtk_s4' => 'required|numeric',
            'nilai_inggris_s4' => 'required|numeric',
            'nilai_pjok_s4' => 'required|numeric',
            'nilai_ipa_s4' => 'required|numeric',
            'nilai_ips_s4' => 'required|numeric',
            'nilai_pkn_s4' => 'required|numeric',
            'nilai_komputer_s4' => 'required|numeric',
            'nilai_sunda_s4' => 'required|numeric',
            'nilai_seni_s4' => 'required|numeric',

            'nilai_agama_s5' => 'required|numeric',
            'nilai_indonesia_s5' => 'required|numeric',
            'nilai_mtk_s5' => 'required|numeric',
            'nilai_inggris_s5' => 'required|numeric',
            'nilai_pjok_s5' => 'required|numeric',
            'nilai_ipa_s5' => 'required|numeric',
            'nilai_ips_s5' => 'required|numeric',
            'nilai_pkn_s5' => 'required|numeric',
            'nilai_komputer_s5' => 'required|numeric',
            'nilai_sunda_s5' => 'required|numeric',
            'nilai_seni_s5' => 'required|numeric',

            'nilai_agama_s6' => 'required|numeric',
            'nilai_indonesia_s6' => 'required|numeric',
            'nilai_mtk_s6' => 'required|numeric',
            'nilai_inggris_s6' => 'required|numeric',
            'nilai_pjok_s6' => 'required|numeric',
            'nilai_ipa_s6' => 'required|numeric',
            'nilai_ips_s6' => 'required|numeric',
            'nilai_pkn_s6' => 'required|numeric',
            'nilai_komputer_s6' => 'required|numeric',
            'nilai_sunda_s6' => 'required|numeric',
            'nilai_seni_s6' => 'required|numeric',
        ], [
            'required' => 'Masukkan Data',
            'max' => 'File yang diUpload lebih dari 2 MB',
            'mimes' => 'Formt File hanyalah PDF, JPEG, dan PNG',
            'numeric' => 'Masukkan berupa Angka. Maksimal 100'
        ]);

        // SEMESTER 1
        $semester1 = Semester1::findOrFail($id_pendaftar);

        $semester1->agama = $request->nilai_agama_s1;
        $semester1->indonesia = $request->nilai_indonesia_s1;
        $semester1->mtk = $request->nilai_mtk_s1;
        $semester1->inggris = $request->nilai_inggris_s1;
        $semester1->pjok = $request->nilai_pjok_s1;
        $semester1->ipa = $request->nilai_ipa_s1;
        $semester1->ips = $request->nilai_ips_s1;
        $semester1->pkn = $request->nilai_pkn_s1;
        $semester1->komputer = $request->nilai_komputer_s1;
        $semester1->sunda = $request->nilai_sunda_s1;
        $semester1->seni = $request->nilai_seni_s1;

        $semester1->save();
        

        
        // SEMESTER 2
        $semester2 = Semester2::where('id_pendaftar', $id_pendaftar)->first();
        if (!$semester2) {
            return redirect()->back()->with('error', 'Data nilai Semester 2 tidak ditemukan.');
        }
        // Update nilai-nilai Semester 2
        $semester2->agama = $request->nilai_agama_s2;
        $semester2->indonesia = $request->nilai_indonesia_s2;
        $semester2->mtk = $request->nilai_mtk_s2;
        $semester2->inggris = $request->nilai_inggris_s2;
        $semester2->pjok = $request->nilai_pjok_s2;
        $semester2->ipa = $request->nilai_ipa_s2;
        $semester2->ips = $request->nilai_ips_s2;
        $semester2->pkn = $request->nilai_pkn_s2;
        $semester2->komputer = $request->nilai_komputer_s2;
        $semester2->sunda = $request->nilai_sunda_s2;
        $semester2->seni = $request->nilai_seni_s2;

        $semester2->save();

        
        //SEMESTER 3
        $semester3 = Semester3::where('id_pendaftar', $id_pendaftar)->first();
        // Jika data Semester3 tidak ditemukan, kembalikan pesan error
        if (!$semester3) {
            return redirect()->back()->with('error', 'Data nilai Semester 3 tidak ditemukan.');
        }
        // Update nilai-nilai Semester 3
        $semester3->agama = $request->nilai_agama_s3;
        $semester3->indonesia = $request->nilai_indonesia_s3;
        $semester3->mtk = $request->nilai_mtk_s3;
        $semester3->inggris = $request->nilai_inggris_s3;
        $semester3->pjok = $request->nilai_pjok_s3;
        $semester3->ipa = $request->nilai_ipa_s3;
        $semester3->ips = $request->nilai_ips_s3;
        $semester3->pkn = $request->nilai_pkn_s3;
        $semester3->komputer = $request->nilai_komputer_s3;
        $semester3->sunda = $request->nilai_sunda_s3;
        $semester3->seni = $request->nilai_seni_s3;
        // Simpan perubahan
        $semester3->save();


        //SEMESTER 4
        $semester4 = Semester4::where('id_pendaftar', $id_pendaftar)->first();

        // Jika data Semester 4 tidak ditemukan, kembalikan pesan error
        if (!$semester4) {
            return redirect()->back()->with('error', 'Data nilai Semester 4 tidak ditemukan.');
        }
        // Update nilai-nilai Semester 4
        $semester4->agama = $request->nilai_agama_s4;
        $semester4->indonesia = $request->nilai_indonesia_s4;
        $semester4->mtk = $request->nilai_mtk_s4;
        $semester4->inggris = $request->nilai_inggris_s4;
        $semester4->pjok = $request->nilai_pjok_s4;
        $semester4->ipa = $request->nilai_ipa_s4;
        $semester4->ips = $request->nilai_ips_s4;
        $semester4->pkn = $request->nilai_pkn_s4;
        $semester4->komputer = $request->nilai_komputer_s4;
        $semester4->sunda = $request->nilai_sunda_s4;
        $semester4->seni = $request->nilai_seni_s4;
        // Simpan perubahan
        $semester4->save();


        //SEMESTER 5
        $semester5 = Semester5::where('id_pendaftar', $id_pendaftar)->first();
        // Jika data Semester 5 tidak ditemukan, kembalikan pesan error
        if (!$semester5) {
            return redirect()->back()->with('error', 'Data nilai Semester 5 tidak ditemukan.');
        }
        // Update nilai-nilai Semester 5
        $semester5->agama = $request->nilai_agama_s5;
        $semester5->indonesia = $request->nilai_indonesia_s5;
        $semester5->mtk = $request->nilai_mtk_s5;
        $semester5->inggris = $request->nilai_inggris_s5;
        $semester5->pjok = $request->nilai_pjok_s5;
        $semester5->ipa = $request->nilai_ipa_s5;
        $semester5->ips = $request->nilai_ips_s5;
        $semester5->pkn = $request->nilai_pkn_s5;
        $semester5->komputer = $request->nilai_komputer_s5;
        $semester5->sunda = $request->nilai_sunda_s5;
        $semester5->seni = $request->nilai_seni_s5;
        // Simpan perubahan
        $semester5->save();


        //SEMESTER 6
        $semester6 = Semester6::findOrFail($id_pendaftar);

        $semester6->agama = $request->nilai_agama_s6;
        $semester6->indonesia = $request->nilai_indonesia_s6;
        $semester6->mtk = $request->nilai_mtk_s6;
        $semester6->inggris = $request->nilai_inggris_s6;
        $semester6->pjok = $request->nilai_pjok_s6;
        $semester6->ipa = $request->nilai_ipa_s6;
        $semester6->ips = $request->nilai_ips_s6;
        $semester6->pkn = $request->nilai_pkn_s6;
        $semester6->komputer = $request->nilai_komputer_s6;
        $semester6->sunda = $request->nilai_sunda_s6;
        $semester6->seni = $request->nilai_seni_s6;

        $semester6->save();

        return redirect('/asal-sekolah/nilai-rapot')->with('success', 'Data Nilai telah ditambahkan.');
    }


    public function show($id)
    {
        $nilaiRapot = NilaiRapot::findOrFail($id);
        // Jangan lupa untuk menambahkan logika untuk menampilkan form edit
    }


    public function destroy($id)
    {
        $nilaiRapot = NilaiRapot::findOrFail($id);
        $nilaiRapot->delete();
        return redirect()->route('nilai.index')->with('success', 'Data nilai siswa berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $nilaiRapots = NilaiRapot::where('nama', 'like', '%' . $search . '%')
            ->orWhere('nisn', 'like', '%' . $search . '%')
            ->get();
        
        return view('asalsekolah.nilai.index', compact('nilaiRapots'));
    }



    public function updateSemester1(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nilai_agama_s1' => 'required|numeric',
            'nilai_indonesia_s1' => 'required|numeric',
            'nilai_mtk_s1' => 'required|numeric',
            // Tambahkan validasi untuk semua input lainnya
        ]);

        // Temukan data Semester1 berdasarkan ID
        $semester1 = Semester1::findOrFail($id);

        // Update nilai-nilai Semester 1
        $semester1->update([
            'agama' => $request->nilai_agama_s1,
            'indonesia' => $request->nilai_indonesia_s1,
            'mtk' => $request->nilai_mtk_s1,
            // Tambahkan update untuk semua input lainnya
        ]);

        // Redirect atau respons sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Data nilai Semester 1 berhasil diperbarui.');
    }



}
