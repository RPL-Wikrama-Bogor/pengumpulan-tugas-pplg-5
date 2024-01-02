@extends('layouts.template')

@section('content')
    <form action="{{ route('login.auth') }}" method="POST" class="card mt-3 p-5">
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
        @endif
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label @error('email') is-innvalid @enderror">Email Pengguna :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label @error('password') is-innvalid @enderror">Password Pengguna :</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection