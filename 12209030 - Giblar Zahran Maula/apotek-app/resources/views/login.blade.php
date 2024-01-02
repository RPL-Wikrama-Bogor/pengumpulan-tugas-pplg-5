@extends('layouts.template')
@section('content')

<form action="{{ route('login.auth') }}" method="POST"  class="card p-4">
  @csrf
  @if (Session::get('failed'))
  <div class="alert alert-danger" role="alert">{{ Session::get('failed') }}</div>
  @endif
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label ">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="{{ old('name') }}" >
          @error('email')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>

      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label ">password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" value="{{ old('name') }}" >
          @error('password')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
  <button type="submit" class="btn btn-primary btn-black">login</button>
  
</form>


@endsection