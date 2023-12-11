@extends('layouts.template')

@section('content')
    <br>
    <form action="{{ route('user.update', $user['id']) }}" method="POST" class="card mt-3 p-5">
      {{-- kalau ada error validasi, akan di tampilkan disini --}}
      @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
      @endif
          {{-- kalau kedeteksi ada with seession namanya  --}}
      @if (Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      {{-- token syarat kirim data (agar sistem membaca bahawa data ini berasal dari sumber yang sah) wajib buat kirim data ke database --}}
      @csrf
      {{-- menyimpan nilai dari attr method di form agar sama kaya yang di rountenya --}}
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
                <input type="text" class="form-control" id="email" name="email" value="{{ $user['email']}}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <select class="form-control" id="role" name="role">
                <option hidden disabled>Pilih</option>
                <option value="admin" {{ $user['admin'] == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ $user['kasir'] == 'kasir' ? 'selected' : '' }}>Kasir</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" value="{{ $user['password'] }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection