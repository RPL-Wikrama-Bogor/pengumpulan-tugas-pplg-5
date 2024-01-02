@extends('layouts.template')

@section('content')
<form action="{{route('user.update', $user['id'])}}" class="card bg-light mt-3 p-5" method="POST">
    {{--untuk menampilakan eror nya di atas --}}
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif --}}
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
    {{--menimpa nilai dari attr method di from , agar sama ka ayang di routenya --}}
    @method('PATCH')
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label" @error('name')@enderror>Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
      @error('name')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
  </div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label" @error('email')@enderror>email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
      @error('email')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label" @error('type')@enderror>tipe penguna</label>
    <div class="col-sm-10">
      <select name="role" id="role" class="form-control">
        <option selected disabled hidden>--Pilih penguna--</option>
        <option value="admin" {{$user['role'] == 'admin' ? 'selected' : ''}}>admin</option>
        <option value="kasir" {{$user['role'] == 'kasir' ? 'selected' : ''}}>kasir</option>
      </select>
      @error('role')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label" @error('password')@enderror>password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" value="{{old('password') }}">
      @error('password')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary">kirim data</button>
</div>

        
        
</form>
@endsection