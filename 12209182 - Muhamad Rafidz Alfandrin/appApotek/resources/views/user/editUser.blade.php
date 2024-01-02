@extends('layouts.template')

@section('content')
    <form action="{{ route('user.update', $user['id']) }}" class="card mt-3 p-5" method="POST">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
@csrf
@method('PATCH')
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nama Pengguna :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label">Email :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $user['email']}}">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label">Password :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name">
  </div> 
  <br><br>
  <label for="type" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
    <div class="col-sm-10">
      <select name="role" id="role" class="form-control">
        <option selected hidden disabled>Pilih</option>
        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
    </select>
    </div>
  <br><br>
<button type="submit" class="btn btn-primary">Kirim data</button>
</form>
@endsection

