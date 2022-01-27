@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <a href="{{ route('vokal.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai
                    Musik</a>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Nilai Penampilan</th>
                            <th scope="col">Nilai Teknik</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilaivokals as $nilaivokal)
                            <tr>
                                <td>{{ $loop->itertion }}</td>
                                <td>{{ $nilaivokal->siswa->nama_siswa }}</td>
                                <td>{{ $nilaivokal->semester }}</td>
                                <td>{{ $nilaivokal->penampilan }}</td>
                                <td>{{ $nilaivokal->teknik }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('nilaivokal.destroy', $nilaivokal->id) }}" method="POST">
                                        <a href="{{ route('nilaivokal.edit', $nilaivokal->id) }}"
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
                                Data Nilai Vokal Belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $nilaivokals->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
