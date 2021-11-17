<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    /**
* create
*
* @return void
*/
public function create()
{
    return view('siswa.create');
}


/**
* store
*
* @param  mixed $request
* @return void
*/
public function store(Request $request)
{
    $this->validate($request, [
        'no'     => 'required',
        'no_induk'     => 'required',
        'nama_siswa'     => 'required',
        'tempat_tgl_lahir'     => 'required',
        'nama_orangtua_siswa'     => 'required',
        'alamat'     => 'required',
        'cabang'   => 'required'
    ]);


    $siswa = Siswa::create([
        'no'                        => $request->no,
        'no_induk'                  => $request->no_induk,
        'nama_siswa'                => $request->nama_siswa,
        'tempat_tgl_lahir'          => $request->tempat_tgl_lahir,
        'nama_orangtua_siswa'       => $request->nama_orangtua_siswa,
        'alamat'                    => $request->alamat,
        'cabang'                    => $request->cabang,
    ]);

    if($siswa){
        //redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
    }
}

/**
* edit
*
* @param  mixed $siswa
* @return void
*/
public function edit(siswa $siswa)
{
    return view('siswa.edit', compact('siswa'));
}


/**
* update
*
* @param  mixed $request
* @param  mixed $siswa
* @return void
*/
public function update(Request $request, siswa $siswa)
{
    $this->validate($request, [
        'no'     => 'required',
        'no_induk'     => 'required',
        'nama_siswa'     => 'required',
        'tempat_tgl_lahir'     => 'required',
        'nama_orangtua_siswa'     => 'required',
        'alamat'     => 'required',
        'cabang'   => 'required'
    ]);

    //get data siswa by ID
    $siswa = Siswa::findOrFail($siswa->id);


        $siswa->update([
            'no'                        => $request->no,
        'no_induk'                  => $request->no_induk,
        'nama_siswa'                => $request->nama_siswa,
        'tempat_tgl_lahir'          => $request->tempat_tgl_lahir,
        'nama_orangtua_siswa'       => $request->nama_orangtua_siswa,
        'alamat'                    => $request->alamat,
        'cabang'                    => $request->cabang,
        ]);

    

    if($siswa){
        //redirect dengan pesan sukses
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
    }
}

/**
* destroy
*
* @param  mixed $id
* @return void
*/
public function destroy($id)
{
  $siswa = Siswa::findOrFail($id);
  Storage::disk('local')->delete('public/siswas/'.$siswa->image);
  $siswa->delete();

  if($siswa){
     //redirect dengan pesan sukses
     return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
  }else{
    //redirect dengan pesan error
    return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
  }
}

}
