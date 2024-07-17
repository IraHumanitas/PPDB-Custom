<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    protected $table = 'jalur'; 
    protected $primaryKey = 'id_jalur'; 

    protected $fillable = [
        'nama_jalur',
        'deskripsi',
        'kuota',
    ];

    public function buktiPpdb()
    {
        return $this->hasMany(BuktiPpdb::class, 'id_jalur'); 
    }

    public function formulirPendaftaran()
    {
        return $this->belongsToMany(FormulirPendaftaran::class, 'jalur_formulir_pendaftaran', 'id_jalur', 'no_pendaftaran')
            ->withTimestamps(); 
    }
}
