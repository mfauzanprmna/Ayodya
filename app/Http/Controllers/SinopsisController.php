<?php

namespace App\Http\Controllers;

use App\Models\Sinopsis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;

class SinopsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $juris = User::all()->where('role', 'juri');
            $sinopsis = Sinopsis::all();
            return view('nilai.sinopsis.index', compact('sinopsis', 'juris'));
        } elseif (Auth::user()->role == 'juri') {
            $sinopsis = Sinopsis::all()->where('id_juri', Auth::user()->id);
            return view('nilai.sinopsis.index', compact('sinopsis'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juri = User::all()->where('role', 'juri');

        return view('nilai.sinopsis.create', compact('juri'));
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
            'tari' => 'required',
            'nilai' => 'required',
        ]);

        if (Auth::user()->role == 'juri') {
            $sinopsis = Sinopsis::create([
                'no_induk' => $request->induk,
                'id_juri' => Auth::guard('user')->user()->id,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'nilai' => $request->nilai,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $sinopsis = Sinopsis::create([
                'no_induk' => $request->induk,
                'id_juri' => $request->juri,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'nilai' => $request->nilai,
            ]);
        }

        if ($sinopsis) {
            //redirect dengan pesan sukses
            return redirect()->route('sinopsis.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('sinopsis.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function show(Sinopsis $sinopsis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinopsis $sinopsis)
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.sinopsis.edit', compact('juris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinopsis $sinopsis)
    {
        $this->validate($request, [
            'id_juri' => 'required',
            'tari_id' => 'required',
            'nilai' => 'required',
        ]);

        //get data nilai by ID
        if (Auth::user()->role == 'juri') {
            $sinopsis = Sinopsis::edit([
                'no_induk' => $request->induk,
                'id_juri' => Auth::guard('user')->user()->id,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'nilai' => $request->nilai,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $sinopsis = Sinopsis::edit([
                'no_induk' => $request->induk,
                'id_juri' => '3',
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'nilai' => $request->nilai,
            ]);
        }

        if ($sinopsis) {
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinopsis = Sinopsis::findOrfail($id);
        $sinopsis->delete();

        if ($sinopsis) {
            //redirect dengan pesan sukses
            return redirect()->route('sinopsis.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('sinopsis.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
