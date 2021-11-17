<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'no','no_induk','nama_siswa','tempat_tgl_lahir','nama_orangtua_siswa','alamat','cabang'
    ];
}
