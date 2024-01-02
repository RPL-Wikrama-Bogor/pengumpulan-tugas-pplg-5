@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Tambah Data User</h1>
    <p>Home | Data Master | Data User | <span style="font-weight: bold">Tambah data User</span></p>
</div>
    <form action="{{ route('user.store')}}" method="post" class="card mt-5 p-5 ml-[300px]">
      @if ($errors->any())
        <ul class="alert alert-danger">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      @csrf
      <h1 class="display-6"style="text-align: center;">
        Form tambah data user!
      </h1>
        <div class="mb-3 row" style="margin-top: 30px;">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" autocomplete="off">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" autocomplete="off">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe pengguna : </label>
            <div class="col-sm-10">
              <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="ps" {{ old('role') == 'ps' ? 'selected' : '' }}>Pembimbing Siswa</option>
            </select>
            </div>
          </div>

          <div class="d-grid gap-2" style="margin-top: 50px;">
            <button class="btn btn-primary bg-blue-700" type="submit">Tambah data</button>
          </div>
    </form>
@endsection