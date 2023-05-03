@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1 class="h2 me-auto">Tabel Jurusan</h1>
                    <a href="#" class="btn btn-primary">Tambah Jurusan</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nama Jurusan</th>
                            <th>Nama Dekan</th>
                            <th>Jumlah Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jurusans as $jurusan)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>
                                    <a href="#">
                                        {{ $jurusan->nama_jurusan }}
                                    </a>
                                </td>
                                <td>{{ $jurusan->nama_dekan }}</td>
                                <td>{{ $jurusan->jumlah_mahasiswa }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak Ada Data . . .</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection