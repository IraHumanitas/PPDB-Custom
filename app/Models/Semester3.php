<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester3 extends Model
{
    use HasFactory;

    protected $table = 'semester3';
    protected $fillable = [
        'id_pendaftar',
        'agama',
        'indonesia',
        'mtk',
        'inggris',
        'pjok',
        'ipa',
        'ips',
        'pkn'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }
}
