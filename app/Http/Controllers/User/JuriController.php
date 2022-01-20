<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juris = User::orderby('name', 'asc')->where('role', 'juri')->paginate(10);
        return view('user.juri.index', compact('juris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.juri.create');
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
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $juris = User::create([
            'name' => $request->name,
            'foto' => 'image/default.png',
            'role' => 'juri',
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        if ($juris) {
            //redirect dengan pesan sukses
            return redirect()->route('juri.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('juri.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.juri.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        //get data siswa by ID
        $juris = User::findOrFail($user->id);
        $file = $request->file('foto');

        // Mendapatkan Nama File
        $extension = $file->getClientOriginalExtension();
        $name = $request->name;
        $nama = explode(" ", $name);
        $nama_file = join("-", $nama) . "." . $extension;

        // Mendapatkan Extension File

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'image/juri';
        $file->move($destinationPath, $nama_file);
        $filenameSimpan = $destinationPath . '/' . $nama_file;

        $juris->update([
            'name' => $request->name,
            'foto' => $filenameSimpan,
            'email' => $request->email,
            // 'password'          => $request->password,
        ]);

        if ($juris) {
            //redirect dengan pesan sukses
            return redirect()->route('juri.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('juri.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::disk('local')->delete('public/juris/' . $user->image);
        $juri = $user->delete();

        if ($juri) {
            //redirect dengan pesan sukses
            return redirect()->route('user.juri.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('user.juri.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
