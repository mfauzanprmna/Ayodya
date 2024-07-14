<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'foto',
        'kelas',
        'no_induk',
        'nama_siswa',
        'semester',
        'tanggal_lahir',
        'orang_tua',
        'alamat',
        'cabang',
        'password',
    ];

    public function tari()
    {
        return $this->hasMany(Nilai::class, 'no_induk', 'no_induk');
    }

    public function vokal()
    {
        return $this->hasMany(Nilaivokal::class, 'no_induk', 'no_induk');
    }

    public function sinopsis()
    {
        return $this->hasMany(Sinopsis::class, 'no_induk');
    }

    public function tempat()
    {
        return $this->belongsTo(User::class, 'cabang', 'singkatan');
    }

    public function kelass()
    {
        return $this->belongsTo(Background::class, 'kelas', 'id');
    }

    public function sertifikat($id)
    {
        $siswas = self::findOrFail($id);
        $layout = Layout::first();

        // Fetching nama_siswa directly using where clause
        $ujian = self::where('nama_siswa', $siswas->nama_siswa)->exists();

        $semester = $siswas->semester;

        $ang = [
            '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan',
            'sembilan', 'sepuluh', 'sebelas',
        ];

        if ($semester < 12) {
            $tbr = $ang[$semester];
        } else if ($semester < 20) {
            $tbr = $ang[$semester - 10] . " belas";
        } else if ($semester < 100) {
            $tbr = $ang[intval($semester / 10)] . " puluh " . $ang[$semester % 10];
        }

        $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
        $rombulan = $romawi[date('n')];

        $split = explode(",", $siswas->tanggal_lahir);
        $tempat = $split[0];
        $lahir = explode(" ", trim($split[1]));
        $tanggal = $lahir[0];
        $bulan = $lahir[1];
        $tahun = $lahir[2];

        $details = [
            'siswas' => $siswas,
            'tempat' => $tempat,
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'rombulan' => $rombulan,
            'semester' => $tbr,
            'ujian' => $ujian,
            'layout' => $layout
        ];

        return $details;
    }
}
