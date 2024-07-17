<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InformasiSekolah extends Model
{
    protected $table        = 'informasi_sekolah';
    protected $primaryKey = 'id';


    protected $fillable = ['judul', 'deskripsi', 'foto', 'date', 'video', 'checkbox',];

}


