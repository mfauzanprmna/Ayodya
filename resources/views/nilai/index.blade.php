@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            {{ $nilais->links() }}
            <div class="card-body kekanan">
                <a href="{{ route('nilai.create') }}" class="btn btn-md btn-success mb-3">TAMBAH NILAI</a>
                <table class="table table-head-bg-primary">
                    <thead>
                        <tr>
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
                                <td>{{ $nilai->no_induk }}</td>
                                <td>{{ $nilai->nama_siswa }}</td>
                                <td>{{ $nilai->jenis_tari }}</td>
                                <td>{{ $nilai->wirama }}</td>
                                <td>{{ $nilai->wiraga }}</td>
                                <td>{{ $nilai->wirasa }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('nilai.destroy', $nilai->id) }}" method="POST">
                                        <a href="{{ route('nilai.edit', $nilai->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
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
            </div>
        </div>    
    </div>

@endsection
