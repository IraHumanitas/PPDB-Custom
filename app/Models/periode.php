<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $table        = 'periode';
    protected $primaryKey   = 'id_periode';

    protected $fillable = ['tahun', 'tanggal_buka', 'tanggal_tutup', 'aktif'];

    public function pendaftar(){
        return $this->hasMany('App\Models\FormulirPendaftaran', 'id_periode', 'id_periode' );
    }
}
