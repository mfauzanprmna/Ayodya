<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
           'no_induk'      => $row[2],
           'nama_siswa'    => $row[1],
           'semester'      => $row[3],
           'tanggal_lahir' => $row[4],
           'orang_tua'     => $row[5],
           'alamat'        => 'depok',
           'cabang'        =>  $row[9],
           'password' => Hash::make('password'),
           'foto' => 'image/default.png',

          
        ]);
    }
}
