<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $table = 'program_keahlian'; 
    protected $primaryKey = 'id_keahlian'; 

    protected $fillable = [
        'nama_program',
        'deskripsi',
        'program',
        'kuota',
        'singkatan'
    ];


    public function jurusan()
    {
        return $this->hasMany(Jurusan::class, 'id'); 
    }

    
}
