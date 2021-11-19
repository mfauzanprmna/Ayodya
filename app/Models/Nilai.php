<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'no_induk','nama_siswa','jenis_tari','wirama','wiraga','wirasa'
    ];
}
