@extends('layouts.template')

@section('content')
    <form action="{{ route('login.auth') }}" class="card p-4 m-3" method="POST">
        <h1 class="animate__animated animate__hinge">Login</h1>
        {{-- with failed daro controller --}}
        @csrf
        @if (Session::get('failed'))
            <div class="alert alert-danger mt-3">{{ Session::get('failed')}}</div>
        @endif
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label @error('email') is-innvalid @enderror">Email :</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label @error('password') is-innvalid @enderror">password :</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
              @error('email')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">login</button>
    </form>    
@endsection