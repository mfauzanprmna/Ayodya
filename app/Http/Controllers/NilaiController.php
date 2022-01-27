<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tarian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->role == 'admin') {
            $nilais = Nilai::latest()->paginate(10);
        } elseif (Auth::user()->role == 'juri') {
            $nilais = Nilai::latest()->where('id_juri', Auth::user()->id)->paginate(10);
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
        $juris = User::all()->where('role', 'juri');

        return view('nilai.tari.create', compact('juris'));
    }

    public function browse(Request $request)
    {
        $data = Tarian::whereRaw("(nama LIKE '%" . $request->get('q') . "%' OR daerah LIKE '%" . $request->get('q') . "%')")
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
            'tari' => 'required',
            'wirama' => 'required',
            'wiraga' => 'required',
            'wirasa' => 'required',
        ]);

        if (Auth::user()->role == 'juri') {
            $nilai = Nilai::create([
                'no_induk' => $request->induk,
                'id_juri' => Auth::guard('user')->user()->id,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'wirama' => $request->wirama,
                'wiraga' => $request->wiraga,
                'wirasa' => $request->wirasa,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $nilai = Nilai::create([
                'no_induk' => $request->induk,
                'id_juri' => '3',
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'wirama' => $request->wirama,
                'wiraga' => $request->wiraga,
                'wirasa' => $request->wirasa,
            ]);
        }

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
        $juris = User::all()->where('role', 'juri');

        return view('nilai.tari.edit', compact('juris'));
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
            'id_juri' => 'required',
            'tari_id' => 'required',
            'wirama' => 'required',
            'wiraga' => 'required',
            'wirasa' => 'required',
        ]);

        //get data nilai by ID
        $nilai = Nilai::findOrFail($nilai->id);

        if (Auth::user()->role == 'juri') {
            $nilai = Nilai::edit([
                'no_induk' => $request->induk,
                'id_juri' => Auth::guard('user')->user()->id,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'wirama' => $request->wirama,
                'wiraga' => $request->wiraga,
                'wirasa' => $request->wirasa,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $nilai = Nilai::edit([
                'no_induk' => $request->induk,
                'id_juri' => '3',
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'wirama' => $request->wirama,
                'wiraga' => $request->wiraga,
                'wirasa' => $request->wirasa,
            ]);
        }

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
