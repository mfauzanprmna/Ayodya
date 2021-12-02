@extends('template.appadmin')
@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('nilaivokal.create') }}" class="btn btn-md btn-success mb-3">TAMBAH NILAI VOKAl</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">no induk</th>
                                <th scope="col">nama siswa</th>
                                <th scope="col">nilai penampilan</th>
                                <th scope="col">nilai teknik</th>
                                <th scope="col">AKSI</th>
                             
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($nilaivokals as $nilaivokal)
                                <tr>
                                    <td>{{ $nilaivokal->no_induk }}</td>
                                    <td>{{ $nilaivokal->nama_siswa }}</td>
                                        <td>{{ $nilaivokal->penampilan }}</td>
                                        <td>{{ $nilaivokal->teknik }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nilaivokal.destroy', $nilaivokal->id) }}" method="POST">
                                            <a href="{{ route('nilaivokal.edit', $nilaivokal->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data nilaivokal belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $nilaivokals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection