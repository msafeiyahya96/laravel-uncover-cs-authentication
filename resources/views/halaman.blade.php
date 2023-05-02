@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $judul }}</div>
                    <div class="card-body">
                        <h3>{{ $judul_facade }}</h3>
                        <div>{{ $id }}</div>
                        <div>{{ $name }}</div>
                        <div>{{ $email }}</div>
                        <hr>
                        <h3>{{ $judul_request }}</h3>
                        <div>{{ $id_request }}</div>
                        <div>{{ $name_request }}</div>
                        <div>{{ $email_request }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection