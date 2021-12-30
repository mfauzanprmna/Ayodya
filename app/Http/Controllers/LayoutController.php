<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $layouts = Layout::latest()->paginate(10);
        return view('layout.index', compact('layouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.create');
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
            'background'     => 'required',
            'kelas'     => 'required',
            
            
         
        ]);

        $file = $request->file('background');
        $file->move(\base_path() . '/public/image/background');
    
        $layout = layout::create([
            'background'                  => 'background/' . $file,
        'kelas'                => $request->kelas,
        
          
        ]);
    
        if($layout){
            //redirect dengan pesan sukses
            return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('layout.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout)
    {
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layout $layout)
    {
        $this->validate($request, [
            'background'     => 'required',
            'kelas'     => 'required',
        ]);

        $file = $request->file('background');

        
    
        //get data layout by ID
        $layout = Layout::findOrFail($layout->id);
    
    
            $layout->update([
                'background'                  => $request->background,
                'kelas'                => $request->kelas,
            ]);
    
        
    
        if($layout){
            //redirect dengan pesan sukses
            return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('layout.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layout $layout)
    {
        {
            $layout->delete();
          
            if($layout){
               //redirect dengan pesan sukses
               return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }else{
              //redirect dengan pesan error
              return redirect()->route('layout.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
    }
}
    }
