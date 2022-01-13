<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderby('nama_siswa', 'asc')->paginate(10);
        return view('user.siswa.index', compact('siswas'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('user.siswa.create');
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
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tempat' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
        ]);

        $siswa = Siswa::create([
            'foto' => 'image/default.png',
            'no_induk' => $request->no_induk,
            'nama_siswa' => $request->nama_siswa,
            'semester' => 'SMT 1',
            'tanggal_lahir' => $request->tempat+', '+$request->tanggal_lahir,
            'orang_tua' => $request->orang_tua,
            'alamat' => $request->alamat,
            'cabang' => $request->cabang,
            'password' => Hash::make('password'),
        ]);

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('user.siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $siswa
     * @return void
     */
    public function edit(Siswa $siswa)
    {
        return view('user.siswa.edit', compact('siswa'));
    }

    public function show(Siswa $siswa)
    {
        return view('user.siswa.show', compact('siswa'));
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
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
        ]);

        //get data siswa by ID
        $siswa = Siswa::findOrFail($siswa->id);
        $file = $request->file('foto');

        // Mendapatkan Nama File
        $extension = $file->getClientOriginalExtension();
        $nama_file = $file->basename($request->nama_siswa, '.', $extension);

        // Mendapatkan Extension File

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'image';
        $file->move($destinationPath, $nama_file);
        $filenameSimpan = $destinationPath . '/' . $nama_file;

        $siswa->update([
            'no_induk' => $request->no_induk,
            'foto' => $filenameSimpan,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'orang_tua' => $request->orang_tua,
            'alamat' => $request->alamat,
            'cabang' => $request->cabang,
            // 'password'          => $request->password,
        ]);

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('user.siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        Storage::disk('local')->delete('public/siswas/' . $siswa->image);
        $siswa->delete();

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('user.siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function fileImport(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file')->store('temp'));
        return back();
    }
}
