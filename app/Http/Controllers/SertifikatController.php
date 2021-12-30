<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
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

      if ($search == '') {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->limit(5)->get();
      } else {
         $employees = Siswa::orderby('nama_siswa', 'asc')->select('id', 'no_induk', 'nama_siswa', 'cabang', 'orang_tua', 'tanggal_lahir', 'foto', 'semester')->where('nama_siswa', 'like', '%' . $search . '%')->limit(5)->get();
      }

      $response = array();
      foreach ($employees as $employee) {
         $response[] = array(
            "id"        => $employee->id,
            "no_induk"  => $employee->no_induk,
            "label"     => $employee->nama_siswa,
            "cabang"    => $employee->cabang,
            "ortu"      => $employee->orang_tua,
            "ttl"       => $employee->tanggal_lahir,
            "foto"      => $employee->foto,
            "semester"  => $employee->semester
         );
      }

      return response()->json($response);
   }

   public function cetak_sertifikat($id)
   {
      $siswas = Siswa::findOrFail($id);

      return view('print.sertifikat', ['siswas' => $siswas]);
   }

   public function sertipdf($id)
   {
      $siswas = Siswa::findOrFail($id);

      $pdf = PDF::loadview('pdf.sertifikat', ['siswas' => $siswas]);

      return $pdf->stream();
   }
}
