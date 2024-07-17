<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormulirPendaftaran extends Model
{
    protected $table = 'formulir'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'no_pendaftaran',
        'skck',
        'id_jalur',
        'id_keahlian',
        'id_kompetensi',
        'id_periode',
        'surat_lulus',
        'skhun',
        'surat_sehat',
        'alamat',
        'foto'
    ];


    public function periode()
{
    return $this->belongsTo(Periode::class, 'id_periode');
}


    public function statusPendaftaran()
    {
        return $this->belongsTo(StatusPendaftaran::class, 'id_status', 'id_status');
    }

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'id_jalur', 'id_jalur');
    }

    public function kompetensiKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_kompetensi');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }

    public function minatBakat()
    {
        return $this->belongsTo(MinatBakat::class, 'id_minatbakat', 'id');
    }
}
