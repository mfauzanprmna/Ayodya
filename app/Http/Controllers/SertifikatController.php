<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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

      $siswa = SIswa::select('nama_siswa')->get();

      $nama = array();

      foreach ($siswa as $key) {
         $nama[] = array(
            $key->nama_siswa,
         );
      }

      if ($search == '') {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->limit(5)->get();
      } else {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('id', 'no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->where('nama_siswa', 'like', '%' . $search . '%')->limit(5)->get();
      }

      $response = array();
      foreach ($employees as $employee) {
         $response[] = array(
            "id" => $employee->id,
            "no_induk" => $employee->no_induk,
            "label" => $employee->nama_siswa,
            "cabang" => $employee->cabang,
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
      $romawi = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
      $rombulan = $romawi[date('n')];

      $split = explode(",", $siswas->tanggal_lahir);
      $tempat = $split[0];
      $lahir = explode(" ", $split[1]);
      $tanggal = $lahir[1];
      $bulan = $lahir[2];
      $tahun = $lahir[3];

      return view('print.sertifikat', ['siswas' => $siswas, 'tempat' => $tempat, 'tanggal' => $tanggal, 'bulan' => $bulan, 'tahun' => $tahun, 'rombulan' => $rombulan]);
   }

   public function sertipdf($id)
   {
      $siswas = Siswa::findOrFail($id);

      $pdf = PDF::loadview('pdf.sertifikat', ['siswas' => $siswas]);

      return $pdf->stream();
   }
}
