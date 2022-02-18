@extends('template.appadmin')
@section('main')
    <div class="container-fluid mt-5">
        <div class="card border-0 shadow rounded">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Data Nilai Tari</h4>
                </div>
            </div>
            <div class="card-body kekanan">
                {{-- <ul class="nav nav-pills nav-secondary nav-pills-no-bd d-flex justify-content-center align-items-center mb-3"
                    id="pills-tab-without-border" role="tablist">
                    @foreach ($juris as $key => $juri)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }} }}" data-bs-target="{{ $juri->id }}" data-toggle="pill" href="#{{ $juri->id }}"
                            role="tab" aria-controls="pills-home-nobd" aria-selected="true">{{ $juri->name }}</a>
                        </li>
                    @endforeach
                </ul> --}}
                <a href="{{ route('nilai.create') }}" class="btn btn-md btn-success mb-3">Tambah Nilai Tari</a>
                <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
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
                            @foreach ($nilais as $nilai)
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
                                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
