<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoalMinatBakat extends Model
{
    protected $table = 'soal_minat_bakat';

    protected $fillable = [
        'pertanyaan',
        'pilihan1',
        'pilihan2',
        'pilihan3',
        'pilihan4',
        'pilihan5',
        'jawaban_benar',
        'skor',
        'id_kompetensi_keahlian',
    ];

    public function kompetensiKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_kompetensi_keahlian', 'id');
    }
}
