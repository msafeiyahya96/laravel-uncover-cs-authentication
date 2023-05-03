@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="pt-4 d-flex justify-content-end align-items-center">
                    <h1 class="h2 me-auto">Info Jurusan {{ $jurusan->nama_jurusan }}</h1>
                    <a href="#" class="btn btn-primary">Edit</a>
                    <form action="#" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ms-3">Hapus</button>
                    </form>
                </div>
                <hr>
                <ul>
                    <li>Nama Jurusan: {{ $jurusan->nama_jurusan }}</li>
                    <li>Nama Dekan: {{ $jurusan->nama_dekan }}</li>
                    <li>Jumlah Mahasiswa: {{ $jurusan->jumlah_mahasiswa }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection