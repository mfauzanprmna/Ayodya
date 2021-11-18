<?php

namespace App\Http\Controllers;

use App\Models\Nilaivokal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NilaivokalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaivokals = Nilaivokal::latest()->paginate(10);
        return view('nilaivokal.index', compact('nilaivokals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilaivokal.create');
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
            'penampilan'     => 'required',
            'teknik'     => 'required',
            
         
        ]);
    
    
        $nilaivokal = Nilaivokal::create([
            'penampilan'                => $request->penampilan,
            'teknik'                => $request->teknik,
            
          
        ]);
    
        if($nilaivokal){
            //redirect dengan pesan sukses
            return redirect()->route('nilaivokal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('nilaivokal.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function show(Nilaivokal $nilaivokal)
    {
        return view('nilaivokal.edit', compact('nilaivokal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilaivokal $nilaivokal)
    {
        return view('nilaivokal.edit', compact('nilaivokal'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilaivokal $nilaivokal)
    {
        $this->validate($request, [
            'penampilan'     => 'required',
            'teknik'     => 'required',
        ]);
    
        //get data nilaivokal by ID
        $nilaivokal = Nilaivokal::findOrFail($nilaivokal->id);
    
    
            $nilaivokal->update([
                'penampilan'                => $request->penampilan,
            'teknik'                => $request->teknik,
            ]);
    
        
    
        if($nilaivokal){
            //redirect dengan pesan sukses
            return redirect()->route('nilaivokal.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('nilaivokal.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $nilaivokal = Nilaivokal::findOrFail($id);
            Storage::disk('local')->delete('public/nilaivokals/'.$nilaivokal->image);
            $nilaivokal->delete();
          
            if($nilaivokal){
               //redirect dengan pesan sukses
               return redirect()->route('nilaivokal.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }else{
              //redirect dengan pesan error
              return redirect()->route('nilaivokal.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
    }
}
}