<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester6 extends Model
{
    use HasFactory;

    protected $table = 'semester6';
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
