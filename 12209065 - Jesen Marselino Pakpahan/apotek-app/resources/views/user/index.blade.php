@extends('layouts.template')

@section('content')

    <a href="{{route('user.create')}}" class="btn btn-primary">Tambah Pengguna</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>   

@endsection