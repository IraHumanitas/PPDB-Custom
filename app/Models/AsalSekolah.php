<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalSekolah extends Model
{
    use HasFactory;

    protected $table = 'asal_sekolah';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];


}