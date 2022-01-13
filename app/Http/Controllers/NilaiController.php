<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Tarian;
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

    public function browse(Request $request)
    {
        $data = Tarian::whereRaw("(nama LIKE '%".$request->get('q')."%' OR daerah LIKE '%".$request->get('q')."%')")
                ->limit(30)
                ->get();
        return response()->json($data);
    }

    public function getSiswa(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'semester')->limit(5)->get();
        } else {
            $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'semester')->where('nama_siswa', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("id" => $employee->no_induk, "label" => $employee->nama_siswa, "semester" => $employee->semester);
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
            'induk'         => 'required',
            'tari'          => 'required',
            'semester'      => 'required',
            'wirama'        => 'required',
            'wiraga'        => 'required',
            'wirasa'        => 'required',

        ]);

        $nilai = Nilai::create([
            'no_induk'      => $request->induk,
            'id_juri'       => Auth::guard('user')->user()->id,
            'tari_id'       => $request->tari,
            'semester'      => $request->semester,
            'wirama'        => $request->wirama,
            'wiraga'        => $request->wiraga,
            'wirasa'        => $request->wirasa,

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
        $taris = Tarian::all();
        
        return view('nilai.edit', compact('nilai', 'taris'));
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
            'no_induk'      => 'required',
            'id_juri'       => 'required',
            'tari_id'       => 'required',
            'semester'      => 'required',
            'wirama'        => 'required',
            'wiraga'        => 'required',
            'wirasa'        => 'required',
        ]);

        //get data nilai by ID
        $nilai = Nilai::findOrFail($nilai->id);

        $nilai->update([
            'no_induk'      => $request->no_induk,
            'id_juri'       => $request->juri,
            'tari_id'       => $request->tari_id,
            'semester'      => $request->semester,
            'wirama'        => $request->wirama,
            'wiraga'        => $request->wiraga,
            'wirasa'        => $request->wirasa,
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
