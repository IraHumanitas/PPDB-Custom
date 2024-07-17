<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = 'pendaftar';
    protected $primaryKey = 'id'; 



    public function asalSekolah()
    {
        return $this->belongsTo(AsalSekolah::class, 'id_asal_sekolah'); 
    }

  
    public function asalKota()
    {
        return $this->belongsTo(AsalKota::class, 'id_asal_kota');
    }

    public function asalKelurahan()
    {
        return $this->belongsTo(AsalKelurahan::class, 'id_asal_kelurahan');
    }
    
    public function userPendaftar()
    {
        return $this->belongsTo(UserPendaftar::class, 'id_login', 'id');
    }

}
