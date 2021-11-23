<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'no_induk',
        'nama_siswa',
        'tempat',
        'tanggal_lahir',
        'orang_tua',
        'alamat',
        'cabang',
        'password'
    ];
}
