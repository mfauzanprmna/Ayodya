<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'tanggal_lahir' => $request->tanggal_lahir,
            'orang_tua' => $request->orang_tua,
            'alamat' => $request->alamat,
            'cabang' => $request->cabang,
            'password' => Hash::make('password'),
        ]);

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
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

        $file = $request->file('foto');

// Mendapatkan Nama File
        $extension = $file->getClientOriginalExtension();
        $name = $request->nama_siswa;
        $nama = explode(" ", $name);
        $nama_file = join("-", $nama) . "." . $extension;

// Proses Upload File
        $destinationPath = 'image/siswa';
        $file->move($destinationPath, $nama_file);
        $filenameSimpan = $destinationPath . '/' . $nama_file;

        if ($request->foto == '' && $request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
            ]);
        } elseif ($request->foto == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'password' => Hash::make($request->password),
            ]);
        } elseif ($request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'foto' => $filenameSimpan,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
            ]);
        } else {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'foto' => $filenameSimpan,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'password' => Hash::make($request->password),
            ]);
        }

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
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
    public function destroy(Siswa $siswa)
    {
        $file = public_path('/') . $siswa->foto;
        $default = public_path('/image/default.png');

        if (file_exists($file)) {
            if ($file != $default) {
                @unlink($file);
            }
        }
        $siswa->delete();

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function fileImport(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file')->store('temp'));
        return back();
    }
}
