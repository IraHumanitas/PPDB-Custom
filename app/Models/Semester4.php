<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester4 extends Model
{
    use HasFactory;

    protected $table = 'semester4';
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
