<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaivokal extends Model
{
    protected $fillable = [
        'no_induk','nama_siswa','penampilan','teknik'
    ];
}
