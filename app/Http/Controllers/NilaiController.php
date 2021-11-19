<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilais = Nilai::latest()->paginate(10);
        return view('nilai.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk'     => 'required',
        'nama_siswa'     => 'required',
        'jenis_tari'     => 'required',
            'wirama'     => 'required',
            'wiraga'     => 'required',
            'wirasa'     => 'required',
         
        ]);
    
    
        $nilai = Nilai::create([
            'no_induk'                  => $request->no_induk,
        'nama_siswa'                => $request->nama_siswa,
        'jenis_tari'     => $request->jenis_tari,
            'wirama'                => $request->wirama,
            'wiraga'                => $request->wiraga,
            'wirasa'                => $request->wirasa,
          
        ]);
    
        if($nilai){
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('nilai.edit', compact('nilai'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $this->validate($request, [
            'no_induk'     => 'required',
            'nama_siswa'     => 'required',
            'jenis_tari'     => 'required',
                'wirama'     => 'required',
                'wiraga'     => 'required',
                'wirasa'     => 'required',
        ]);
    
        //get data nilai by ID
        $nilai = Nilai::findOrFail($nilai->id);
    
    
            $nilai->update([
                'no_induk'                  => $request->no_induk,
        'nama_siswa'                => $request->nama_siswa,
        'jenis_tari'     => $request->jenis_tari,
            'wirama'                => $request->wirama,
            'wiraga'                => $request->wiraga,
            'wirasa'                => $request->wirasa,
            ]);
    
        
    
        if($nilai){
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $nilai = Nilai::findOrFail($id);
            Storage::disk('local')->delete('public/nilais/'.$nilai->image);
            $nilai->delete();
          
            if($nilai){
               //redirect dengan pesan sukses
               return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }else{
              //redirect dengan pesan error
              return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
    }
}
}