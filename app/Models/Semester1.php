<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester1 extends Model
{
    use HasFactory;

    protected $table = 'semester1';
    protected $fillable = [
        'id_pendaftar',
        'agama',
        'indonesia',
        'mtk',
        'inggris',
        'pjok',
        'ipa',
        'ips',
        'pkn',
        'seni',
        'komputer',
        'sunda'
    ];

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id');
    }
}
