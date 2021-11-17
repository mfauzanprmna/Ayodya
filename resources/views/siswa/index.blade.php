@extends('template.appadmin')
@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">TAMBAH siswa</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">no</th>
                                <th scope="col">no induk</th>
                                <th scope="col">nama siswa</th>
                                <th scope="col">tempat_tgl_lahir</th>
                                <th scope="col">nama_orangtua_siswa</th>
                                <th scope="col">alamat</th>
                                <th scope="col">cabang</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($siswas as $siswa)
                                <tr>
                                        <td>{{ $siswa->no }}</td>
                                        <td>{{ $siswa->no_induk }}</td>
                                        <td>{{ $siswa->nama_siswa }}</td>
                                        <td>{{ $siswa->tempat_tgl_lahir }}</td>
                                        <td>{{ $siswa->nama_orangtua_siswa }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>{{ $siswa->cabang }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                            <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data siswa belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $siswas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection