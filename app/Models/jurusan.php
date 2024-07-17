<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'nama',
        'singkatan',
        'id_kompetensi',
        'logo',
        'foto',
        'deskripsi',
    ];

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_kompetensi', 'id_keahlian');
    }
}
