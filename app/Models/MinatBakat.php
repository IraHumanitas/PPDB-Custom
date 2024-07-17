<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinatBakat extends Model
{
    protected $table = 'minat_bakat';

    protected $fillable = [
        'id_pendaftar',
        'id_kompetensi_keahlian',
        'hasil',
        'id_soal',
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }

    public function kompetensiKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_kompetensi_keahlian', 'id_keahlian');
    }

    public function soalMinatBakat()
    {
        return $this->belongsTo(SoalMinatBakat::class, 'id_soal', 'id');
    }
}
