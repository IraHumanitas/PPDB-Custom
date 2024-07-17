<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalKelurahan extends Model
{
    use HasFactory;

    protected $table = 'asal_kelurahan';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'jarak'];


}
