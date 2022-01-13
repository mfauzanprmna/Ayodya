@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            {{ $nilais->links() }}
            <div class="card-body kekanan">
                <a href="{{ route('nilai.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai Tari</a>
                <div class="table-responsive">
                    <table class="display table table-striped table-hover">
                        <thead style="background: #7a74fc" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Jenis Tari</th>
                            <th scope="col">Wirama</th>
                            <th scope="col">Wiraga</th>
                            <th scope="col">Wirasa</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($nilais as $nilai)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $nilai->siswa->nama_siswa }}</td>
                                <td>{{ $nilai->tari->nama }}</td>
                                <td>{{ $nilai->wirama }}</td>
                                <td>{{ $nilai->wiraga }}</td>
                                <td>{{ $nilai->wirasa }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                                        <a href="{{ route('nilai.edit', $nilai->id) }}"
                                            class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-                                                                                                                                                                                                       danger"><i
                                                    class="fas fa-trash"></i></button>
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
                </div>
                <div class="d-flex justify-content-center">
                    {{ $nilais->links() }}
                </div>
            </div>
        </div>    
    </div>

@endsection
