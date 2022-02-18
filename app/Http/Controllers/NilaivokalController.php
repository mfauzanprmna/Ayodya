<?php

namespace App\Http\Controllers;

use App\Models\Nilaivokal;
use App\Models\User;
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
        $nilaivokals = Nilaivokal::all();
        return view('nilai.vokal.index', compact('nilaivokals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juri = User::all()->where('role', 'juri');

        return view('nilai.vokal.create', compact('juri'));
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
            'no_induk'    => 'required',
            'nama_siswa'  => 'required',
            'penampilan'  => 'required',
            'teknik'      => 'required',
        ]);

        $nilaivokal = Nilaivokal::create([
            'no_induk'       => $request->no_induk,
            'nama_siswa'     => $request->nama_siswa,
            'penampilan'     => $request->penampilan,
            'teknik'         => $request->teknik,
        ]);

        if ($nilaivokal) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        return view('nilai.vokal.edit', compact('nilaivokal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilaivokal $nilaivokal)
    {
        return view('nilai.vokal.edit', compact('nilaivokal'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilaivokal $vokal)
    {
        $this->validate($request, [
            'no_induk'     => 'required',
            'nama_siswa'     => 'required',
            'penampilan'     => 'required',
            'teknik'     => 'required',
        ]);

        $edit = $vokal->update([
            'no_induk'                  => $request->no_induk,
            'nama_siswa'                => $request->nama_siswa,
            'penampilan'                => $request->penampilan,
            'teknik'                => $request->teknik,
        ]);

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilaivokal $vokal)
    {
        $delete = $vokal->delete();

        if ($delete) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
