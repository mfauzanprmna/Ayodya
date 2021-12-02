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
         $employees = Siswa::orderby('nama_siswa','asc')->select('id','nama_siswa', 'cabang')->limit(5)->get();
      }else{
         $employees = Siswa::orderby('nama_siswa','asc')->select('id','nama_siswa', 'cabang')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array("value"=>$employee->id,"label"=>$employee->nama_siswa,"tes"=>$employee->cabang);
      }

      return response()->json($response);
   }
}
