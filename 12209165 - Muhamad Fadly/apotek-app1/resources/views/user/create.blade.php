@extends('layouts.template')

@section('content')
<form action="{{route('user.store')}}" class="card bg-light border-primary mt-3 p-5" method="POST">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif --}}
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label" @error('name')@enderror>Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{old('name') }}">
      @error('name')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label" @error('email')@enderror>email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" value="{{old('email') }}">
      @error('email')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label" @error('type')@enderror>tipe penguna</label>
    <div class="col-sm-10">
      <select name="role" id="role" class="form-control">
        <option selected disabled hidden>--Pilih penguna--</option>
        <option value="admin" {{old('role') == 'admin' ? 'selected' : ''}}>admin</option>
        <option value="kasir" {{old('role') == 'kasir' ? 'selected' : ''}}>kasir</option>
      </select>
      @error('role')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
        <button type="submit" class="btn btn-primary">kirim data</button>
        
</form>
@endsection