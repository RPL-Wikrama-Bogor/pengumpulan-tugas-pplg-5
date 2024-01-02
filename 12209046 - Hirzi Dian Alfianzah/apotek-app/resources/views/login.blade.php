@extends('layouts.template')

@section('content')
<form action="{{ route('login.auth') }}" class="card p-4 mt-5" method="POST">
    @csrf
    {{-- with gailed dari controller --}}
    @if (Session::get('failed'))
        <div class="alert alert-danger mt-3">{{ Session::get('failed') }}</div>
    @endif
    <center><h1>Login</h1></center>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" placeholder="Email" id="email" name="email"
                value="{{ old('email') }}">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password :</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" placeholder="Password" id="password" name="password"
                value="{{ old('password') }}">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>
@endsection