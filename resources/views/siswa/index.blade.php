@extends('template.appadmin')
@section('main')

    <div class="container mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">Tambah Siswa</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">No Induk</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Tempat Tanggal Lahir</th>
                            <th scope="col">Orang Tua Siswa</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Cabang</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('image/' . $siswa->foto) }}" alt="" width="40%">
                                </td>
                                <td>{{ $siswa->no_induk }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>SMT {{ $siswa->semester }}</td>
                                <td>{{ $siswa->tempat }}, {{ $siswa->tanggal_lahir }}</td>
                                <td>{{ $siswa->orang_tua }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->cabang }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
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

@endsection
