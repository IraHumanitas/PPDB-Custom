<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'status_pendaftar';

    protected $fillable = [
        'nisn',
        'status',
        'no_pendaftaran',
        'keterangan',
        'id_user',
        'tanggal_verifikasi',
    ];

    // Event model untuk menetapkan nilai dari kolom lain sebelum penciptaan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ambil id_pendaftar berdasarkan nisn
            $userPendaftar = UserPendaftar::where('nisn', $model->nisn)->first();
            if ($userPendaftar) {
                $model->id_pendaftar = $userPendaftar->id;
            }

            // Ambil no_pendaftaran berdasarkan nisn
            $formulir = FormulirPendaftaran::where('nisn', $model->nisn)->first();
            if ($formulir) {
                $model->no_pendaftaran = $formulir->no_pendaftaran;
            }
        });
    }
}
