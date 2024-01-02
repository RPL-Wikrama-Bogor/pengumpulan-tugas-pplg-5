@extends('layouts.template')

@section('content')
<form action="{{ route('user.store') }}" method="post" class="card p-5 mt-5">

    @csrf
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label" @error('password') is-invalid @enderror>Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label" @error('email') is-invalid @enderror>Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
        <div class="col-sm-10">
          <select name="role" id="role" class="form-control">
            <option selected hidden disabled>Pilih</option>
            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="Kasir" {{ old('role') == 'Kasir' ? 'selected' : '' }}>Kasir</option>
          </select>
      </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan Data</button>
</form>
@endsection