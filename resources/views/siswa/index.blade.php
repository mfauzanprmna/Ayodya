@extends('template.appadmin')
@section('main')

    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-body kekanan">
                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>
                <a href="{{ route('siswa.create') }}" class="btn btn-md btn-success mb-3">Tambah Siswa</a>
                <table class="table  ">
                    <thead style="background: #7a74fc" class="text-white text-center">
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
                                    <img src="{{ asset('/' . $siswa->foto) }}" alt="" width="80px">
                                </td>
                                <td>{{ $siswa->no_induk }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td> {{ $siswa->semester }}</td>
                                <td>{{ $siswa->tempat }}, {{ $siswa->tanggal_lahir }}</td>
                                <td>{{ $siswa->orang_tua }}</td>
                                <td>{{ $siswa->alamat }}</td>
                                <td>{{ $siswa->cabang }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                        <a href="{{ route('siswa.show', $siswa->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
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
