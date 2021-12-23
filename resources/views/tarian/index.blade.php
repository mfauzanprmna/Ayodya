@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <a href="{{ route('tarian.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai
                    Musik</a>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">nama</th>
                            <th scope="col">daerah</th>
        
                            <th scope="col">AKSI</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tarians as $tarian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tarian->nama}}</td>
                                <td>{{ $tarian->daerah }}</td>
                               
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('tarian.destroy', $tarian->id) }}" method="POST">
                                        <a href="{{ route('tarian.edit', $tarian->id) }}"
                                            class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
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
                </div>
                <div class="d-flex justify-content-center">
                    {{ $tarians->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
