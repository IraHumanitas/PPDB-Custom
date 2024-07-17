<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InformasiPPDB extends Model
{
    protected $table        = 'informasi_ppdb';
    protected $primaryKey = 'id';


    protected $fillable = ['judul', 'deskripsi', 'foto', 'date', 'video', 'checkbox',];

}


