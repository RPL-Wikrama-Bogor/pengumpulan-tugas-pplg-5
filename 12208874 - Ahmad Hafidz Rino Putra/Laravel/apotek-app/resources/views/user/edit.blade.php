@extends('layouts.template')

@section('content')

<form action="{{ route('user.update', $user['id'])}}" class="card mt-5 p-5" method="post">
    @method('PATCH')
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ $user['role'] == 'kasir' ? 'selected' : '' }}>Kasir</option>
              </select>
        </div>
      </div> 
      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="password" name="password"  placeholder="Optional">
        </div>
      </div>
      <button type="submit" class="btn btn-dark">Kirim Data</button>
</form>

@endsection