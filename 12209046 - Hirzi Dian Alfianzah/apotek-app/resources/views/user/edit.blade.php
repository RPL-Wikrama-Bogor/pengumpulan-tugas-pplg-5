@extends('layouts.template')

@section('content')
<form action="{{ route('user.update', $user['id']) }}" method="post" class="mt-4">
    
    {{-- Menyimpan data ke database --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>    
    @endif

    {{-- Jika ada variabel sesi 'success', tampilkan pesan di halaman ini --}}
    
    @csrf
    @method('PATCH')

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Pengguna:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Nama Email:</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
    </div>    

    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna:</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih Tipe Pengguna</option>
                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ $user['role'] == 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Ubah Password:</label>
        <div class="col-sm-10">
            <input type="password" name="password" id="password" class="form-control">
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection