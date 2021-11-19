@extends('template.appadmin')
@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('nilai.create') }}" class="btn btn-md btn-success mb-3">TAMBAH nilai</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">no induk</th>
                                <th scope="col">nama siswa</th>
                                <th scope="col">jenis tari</th>
                                <th scope="col">wirama</th>
                                <th scope="col">wiraga</th>
                                <th scope="col">wirasa</th>
                                <th scope="col">AKSI</th>
                             
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($nilais as $nilai)
                                <tr>
                                    <td>{{ $nilai->no_induk }}</td>
                                    <td>{{ $nilai->nama_siswa }}</td>
                                    <td>{{ $nilai->jenis_tari }}</td>
                                        <td>{{ $nilai->wirama }}</td>
                                        <td>{{ $nilai->wiraga }}</td>
                                        <td>{{ $nilai->wirasa }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data nilai belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $nilais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection