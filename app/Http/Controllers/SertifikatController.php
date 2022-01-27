<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Sinopsis;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Tarian;
use Illuminate\Http\Request;
use PDF;

class SertifikatController extends Controller
{
   public function index()
   {
      $siswas = Siswa::orderby('nama_siswa', 'asc')->get();
      return view('sertifikat', compact('siswas'));
   }

   /*
    AJAX request
     */
   public function getSertifikat(Request $request)
   {
      $search = $request->search;

      $siswa = Siswa::select('nama_siswa')->get();

      $nama = array();

      foreach ($siswa as $key) {
         $nama[] = array(
            $key->nama_siswa,
         );
      }

      if ($search == '') {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->get();
      } else {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('id', 'no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->where('nama_siswa', 'like', '%' . $search . '%')->get();
      }

      $response = array();
      foreach ($employees as $employee) {
         $response[] = array(
            "id" => $employee->id,
            "no_induk" => $employee->no_induk,
            "label" => $employee->nama_siswa,
            "cabang" => $employee->tempat->name,
            "ortu" => $employee->orang_tua,
            "ttl" => $employee->tanggal_lahir,
            "foto" => $employee->foto,
            "semester" => $employee->semester,
            "index" => array_search([$employee->nama_siswa], $nama),
         );
      }

      return response()->json($response);
   }

   public function cetak_sertifikat($id)
   {
      $siswas = Siswa::findOrFail($id);

      $siswa = Siswa::select('nama_siswa')->get();

      $nama = array();

      foreach ($siswa as $key) {
         $nama[] = array(
            $key->nama_siswa,
         );
      }

      $ujian = array_search([$siswas->nama_siswa], $nama);

      $semester = $siswas->semester;

      $ang = [
         '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan',
         'sembilan', 'sepuluh', 'sebelas',
      ];

      if ($semester < 12) {
         $tbr = $ang[$semester];
      } else if ($semester < 20) {
         $tbr = $ang[$semester - 10] + " belas";
      } else if ($semester < 100) {
         $tbr = $ang[floor($semester / 10)] + " puluh " + $ang[$semester % 10];
      }

      $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
      $rombulan = $romawi[date('n')];

      $split = explode(",", $siswas->tanggal_lahir);
      $tempat = $split[0];
      $lahir = explode(" ", $split[1]);
      $tanggal = $lahir[1];
      $bulan = $lahir[2];
      $tahun = $lahir[3];

      return view('print.sertifikat', ['siswas' => $siswas, 'tempat' => $tempat, 'tanggal' => $tanggal, 'bulan' => $bulan, 'tahun' => $tahun, 'rombulan' => $rombulan, 'semester' => $tbr, 'ujian' => $ujian]);
   }

   public function cetak_nilai($id)
   {
      $siswas = Siswa::findOrFail($id);

      $siswa = Siswa::select('nama_siswa')->get();
      
      $nama = array();
      
      foreach ($siswa as $key) {
         $nama[] = array(
            $key->nama_siswa,
         );
      }
      
      $ujian = array_search([$siswas->nama_siswa], $nama);
      
      $semester = $siswas->semester;

      $ang = [
         '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan',
         'sembilan', 'sepuluh', 'sebelas',
      ];
      
      if ($semester < 12) {
         $tbr = $ang[$semester];
      } else if ($semester < 20) {
         $tbr = $ang[$semester - 10] + " belas";
      } else if ($semester < 100) {
         $tbr = $ang[floor($semester / 10)] + " puluh " + $ang[$semester % 10];
      }
      
      $juri = User::all()->where('role', 'juri');

      // Nilai Tari
      $tarian1 = Nilai::where('no_induk', $siswas->no_induk)->limit($juri->count() * 2)->first();
      $tarian2 = Nilai::latest()->where('no_induk', $siswas->no_induk)->limit($juri->count() * 2)->first();
      $tari1 = Nilai::where('tari_id', $tarian1->tari_id)->limit($juri->count() * 2)->get();
      $tari2 = Nilai::where('tari_id', $tarian2->tari_id)->limit($juri->count() * 2)->get();

      // Nilai Wirama
      $wirama1 = array();

      foreach ($tari1 as $key) {
         $wirama1[] = $key->wirama;
      }

      $hasil1 = round(array_sum($wirama1) / $juri->count(), 2);


      $wirama2 = array();

      foreach ($tari2 as $key) {
         $wirama2[] = $key->wiraga;
      }

      $hasil2 = round(array_sum($wirama2) / $juri->count(), 2);

      // Nilai Wiraga
      $wiraga1= array();

      foreach ($tari1 as $key) {
         $wiraga1[] = $key->wiraga;
      }

      $hasil3 = round(array_sum($wiraga1) / $juri->count(), 2);

      $wiraga2 = array();

      foreach ($tari2 as $key) {
         $wiraga2[] = $key->wiraga;
      }

      $hasil4 = round(array_sum($wiraga2) / $juri->count(), 2);

      // Nilai Wirasa
      $wirasa1 = array();

      foreach ($tari1 as $key) {
         $wirasa1[] = $key->wirasa;
      }

      $hasil5 = round(array_sum($wirasa1) / $juri->count(), 2);

      $wirasa2 = array();

      foreach ($tari2 as $key) {
         $wirasa2[] = $key->wirasa;
      }

      $hasil6 = round(array_sum($wirasa2) / $juri->count(), 2);

      // Subtotal
      $sub1 = ($hasil1 + $hasil3 + $hasil5) / 3;
      $sub2 = ($hasil2 + $hasil4 + $hasil6) / 3;
      $subtotal1 = round(($hasil1 + $hasil3 + $hasil5) / 3, 2);
      $subtotal2 = round(($hasil2 + $hasil4 + $hasil6) / 3, 2);

      // Total
      $total = round(($sub1 + $sub2) / 2, 2);

      // Nilai Sinopsis
      $sinopsis = Sinopsis::latest()->where('no_induk', $siswas->no_induk)->limit($juri->count())->get();
      $nilai = array();

      foreach ($sinopsis as $key) {
         $nilai[] = $key->nilai;
      }

      $hasilsinop = array_sum($nilai) / $juri->count();

      // Daerah
      $daerah1 = Tarian::where('id', $tarian1->tari_id)->first();
      $daerah2 = Tarian::where('id', $tarian2->tari_id)->first();

      return view('print.nilai', [
         'siswas' => $siswas, 
         'semester' => $tbr, 
         'ujian' => $ujian, 
         'sinopsis' => $hasilsinop,
         'wirama1' => $hasil1,
         'wirama2' => $hasil2,
         'wiraga1' => $hasil3,
         'wiraga2' => $hasil4,
         'wirasa1' => $hasil5,
         'wirasa2' => $hasil6,
         'tarian1' => $daerah1->nama,
         'tarian2' => $daerah2->nama,
         'daerah1' => $daerah1->daerah,
         'daerah2' => $daerah2->daerah,
         'subtotal1' => $subtotal1,
         'subtotal2' => $subtotal2,
         'total' => $total
      ]);
   }

   public function sertipdf($id)
   {
      $siswas = Siswa::findOrFail($id);

      $pdf = PDF::loadview('pdf.sertifikat', ['siswas' => $siswas]);

      return $pdf->stream();
   }
}
