@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <a href="{{ route('juri.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai
                    Musik</a>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($juris as $juri)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $juri->name }}</td>
                                <td>
                                    <img src="{{ asset('/' . $juri->foto) }}" alt="" width="80px">
                                </td> 
                                <td>{{ $juri->email }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('juri.destroy', $juri->id) }}" method="POST">
                                        <a href="{{ route('juri.edit', $juri->id) }}"
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
                                Data Juri Belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $juris->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
