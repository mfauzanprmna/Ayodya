<?php
namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        Log::info('Row data: ', $row);

        return new Siswa([
            'no_induk' => $row['no_induk'],
            'nama_siswa' => $row['nama_siswa'],
            'kelas' => request('kelas'),
            'semester' => $row['semester'],
            'tanggal_lahir' => $row['tempat_lahir'] . ", " . $row['tanggal_lahir'],
            'orang_tua' => $row['orang_tua'],
            'alamat' => 'depok',
            'cabang' => $row['cabang'],
            'password' => Hash::make('password'),
            'foto' => 'image/default.png',
        ]);
    }
}
