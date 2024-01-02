@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Edit Data User</h1>
    <p>Home | Data Master | <span style="font-weight: bold">Edit Data User</span></p>
</div>
<form action="{{route('user.update', $user['id'])}}" class="card bg-light mt-3 p-5 ml-[300px]" method="POST">
    @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
    @csrf
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
        <option value="admin" {{$user['role'] == 'admin' ? 'selected' : ''}}>Admin</option>
        <option value="ps" {{$user['role'] == 'ps' ? 'selected' : ''}}>Pembimbing Siswa</option>
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
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary bg-blue-700">Edit data</button>
</div>

        
        
</form>
@endsection