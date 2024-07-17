<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiRapot extends Model
{
    protected $table = 'nilai_rapot';
    protected $fillable = [
        'id_pendaftar',
        'averageS1',
        'averageS2',
        'averageS3',
        'averageS4',
        'averageS5',
        'averageS6',
        'averageMTK',
        'averageInggris',
        'averageKomputer',
        'averageAll'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }

    public function calculateSemesterAverage($semester)
    {
        // Ambil nama model semester berdasarkan nomor semester
        $semesterModel = 'App\Models\Semester' . $semester;

        // Cek apakah model semester tersebut ada
        if (!class_exists($semesterModel)) {
            return null;
        }

        // Ambil data nilai semester menggunakan relasi dengan model semester
        $nilaiSemester = $semesterModel::where('id_pendaftar', $this->id_pendaftar)->first();

        // Jika data nilai semester tidak ditemukan, kembalikan null
        if (!$nilaiSemester) {
            return null;
        }

        // Hitung rata-rata nilai semester
        $totalNilai = ($nilaiSemester->agama + $nilaiSemester->indonesia + $nilaiSemester->mtk + $nilaiSemester->inggris + $nilaiSemester->pjok + $nilaiSemester->ipa + $nilaiSemester->ips + $nilaiSemester->pkn + $nilaiSemester->komputer + $nilaiSemester->sunda + $nilaiSemester->seni) / 11;

        return $totalNilai;
    }

    public function calculateTotalNilai()
    {
        // Hitung total nilai dari rata-rata nilai semester 1 sampai 6
        $totalNilai = 0;

        for ($i = 1; $i <= 6; $i++) {
            $totalNilai += $this->calculateSemesterAverage($i) ?? 0;
        }

        return $totalNilai;
    }

}
