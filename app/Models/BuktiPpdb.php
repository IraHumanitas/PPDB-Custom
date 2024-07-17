<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuktiPpdb extends Model

{
    protected $table = 'bukti_ppdb'; 

    protected $primaryKey = 'id_bukti'; 
    protected $fillable =[
        'bukti',
    ];

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'id_jalur');
    }
}
