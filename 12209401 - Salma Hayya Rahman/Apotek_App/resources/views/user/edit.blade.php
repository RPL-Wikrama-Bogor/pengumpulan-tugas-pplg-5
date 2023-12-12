@extends('layouts.template')

@section('content')
<form action="{{ route('user.update' , $user['id']) }}" class="card mt-5 p-5" method="POST">
    @csrf

    {{-- menimpa nilai dr attr method di form, agar sama kaya yang di routenya --}}
    @method('PATCH')
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label ">Nama : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
      @error('name')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label ">Email : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
      @error('email')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label ">Tipe Pengguna</label>
    <div class="col-sm-10">
      <select name="role" id="role" class="form-control">
        <option selected hidden disabled>Pilih</option>
        <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>admin</option>
        <option value="kasir" {{ $user['role'] == 'kasir' ? 'selected' : '' }}>kasir</option>
      </select>
      @error('role')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
    <div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Ubah Password : </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="password" name="password" value="{{ $user['password'] }}">
      @error('password')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    </div>
<button type="submit" class="btn btn-primary">Update Data</button>
</form>
@endsection 