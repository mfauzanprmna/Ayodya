<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'foto',
        'no_induk',
        'nama_siswa',
        'semester',
        'tempat',
        'tanggal_lahir',
        'orang_tua',
        'alamat',
        'cabang',
        'password'
    ];
}
