@extends('layouts.template')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
    
    <a class="kembali" href="{{route('user.akun')}}">Tekan untuk kembali</a>
</div>

@endif
    <h1>Buat akun</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin">Admin</option>
                <option value="ps">PS</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Buat Akun</button>
    </form>
@endsection
<style>
.kembali:hover{
    margin-right:10px; 
}
</style>
