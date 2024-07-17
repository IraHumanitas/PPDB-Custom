<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalKota extends Model
{
    use HasFactory;

    protected $table = 'asal_kota';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

}
