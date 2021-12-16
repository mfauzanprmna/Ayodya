<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SertifikatController extends Controller
{
    public function index(){
      return view('sertifikat');
   }

   /*
   AJAX request
   */
   public function getSertifikat(Request $request){
      $search = $request->tags;

      if($search == ''){
         $employees = Siswa::orderby('nama_siswa','asc')->all()->limit(5)->get();
      }else{
         $employees = Siswa::orderby('nama_siswa','asc')->all()->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array("id"        =>   $employee->id,
                              "nama"     =>   $employee->nama_siswa,
                              "cabang"   =>   $employee->cabang,
                              "ortu"     =>   $employee->orang_tua,
                              "ttl"      =>   $employee->tanggal_lahir);
      }

      return response()->json($response);
   }
}
