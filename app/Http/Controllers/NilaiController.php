<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Undian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $nilais = Nilai::latest()->paginate(10);
        } elseif (Auth::user()->role == 'juri') {
            $nilais = Nilai::latest()->where('juri', Auth::user()->id)->paginate(10);
        }
        
        return view('nilai.tari.index', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nilai.tari.create');
    }

    public function getSertifikat(Request $request)
    {
        $search = $request->nomor;
        $induk = Undian::where('nomor', $request->nomor);
        if ($search == '') {
            $employees = Undian::orderby('nomor', 'asc')->select('id', 'nama_siswa', 'cabang')->limit(5)->get();
        } else {
            $employees = Undian::orderby('nomor', 'asc')->join('')->select('id', 'nama_siswa', 'cabang')->where('nomor_induk', 'like', '%' . $induk->nomor_induk . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("value" => $employee->id, "label" => $employee->nama_siswa, "tes" => $employee->cabang);
        }

        return response()->json($response);
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
            'no_induk'=> 'required',
            'Nama'    => 'required',
            'tari_id' => 'required',
            'Semester'=> 'required',
            'wirama' => 'required',
            'wiraga' => 'required',
            'wirasa' => 'required',

        ]);

        $nilai = Nilai::create([
            'no_induk'=> $request->no_induk,
            'Nama'    => $request->Nama,
            'tari_id' => $request->tari_id,
            'Semester'=> $request->Semester,
            'wirama' => $request->wirama,
            'wiraga' => $request->wiraga,
            'wirasa' => $request->wirasa,

        ]);

        if ($nilai) {
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
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
        return view('nilai.tari.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        return view('nilai.tari.edit', compact('nilai'));
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
            'no_induk'=> 'required',
            'Nama'    => 'required',
            'tari_id' => 'required',
            'Semester'=> 'required',
            'wirama' => 'required',
            'wiraga' => 'required',
            'wirasa' => 'required',
        ]);

        //get data nilai by ID
        $nilai = Nilai::findOrFail($nilai->id);

        $nilai->update([
            'no_induk'=> $request->no_induk,
            'Nama'    => $request->Nama,
            'tari_id' => $request->tari_id,
            'Semester'=> $request->Semester,
            'wirama' => $request->wirama,
            'wiraga' => $request->wiraga,
            'wirasa' => $request->wirasa,
        ]);

        if ($nilai) {
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
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $nilai = Nilai::findOrFail($id);
            Storage::disk('local')->delete('public/nilais/' . $nilai->image);
            $nilai->delete();

            if ($nilai) {
                //redirect dengan pesan sukses
                return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
            } else {
                //redirect dengan pesan error
                return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
        }
    }
}
