@extends('layouts.template')

@section('content')

<form action="{{ route('user.store') }}" class="card mt-5 p-5" method="post">
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
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
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
              </select>
              @error('role')
          <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Kirim Data</button>
</form>

@endsection