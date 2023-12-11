@extends('layouts.template')

@section('content')
    <br>
    <form action="{{ route('user.store') }}" method="post" class="card mt-3 p-5">
        {{-- kalau ada error validasi, akan di tampilkan disini --}}
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- kalau kedeteksi ada with seession namanya  --}}
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        {{-- token syarat kirim data (agar sistem membaca bahawa data ini berasal dari sumber yang sah) wajib buat kirim data ke database --}}
        @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label @error('name') is-innvalid @enderror">Nama Pengguna :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class= "mb-3 row">
            <label for="email" class="col-sm-2 col-form-label @error('email') is-innvalid @enderror">Email Pengguna :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
            <div class="col-sm-10">
                <select class="form-control" id="role" name="role">
                    <option selected hidden disabled>Pilih Role</option>
                    <option value="admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection