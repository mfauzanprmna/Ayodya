@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">

                <div class="mb-3 d-flex justify-content-between">
                    <a href="{{ route('tarian.create') }}" class="btn btn-md btn-success">Tambah Siswa</a>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Export Excel
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Import Excel
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('tari-import') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                        <div class="custom-file text-left">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Import data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
