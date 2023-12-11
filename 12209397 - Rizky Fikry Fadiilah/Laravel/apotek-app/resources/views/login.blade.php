@extends('layouts.template')

@section('content')
    <form action="{{ route('login.auth') }}" class="card p-4 mt-5" method="POST">
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
        @endif
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label @error('email') is-invalid @enderror">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" id="email" class="form-control">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label @error('password') is-invalid @enderror">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
@endsection
