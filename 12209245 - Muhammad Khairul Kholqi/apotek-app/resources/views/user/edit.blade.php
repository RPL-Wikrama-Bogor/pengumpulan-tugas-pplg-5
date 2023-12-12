@extends('layouts.template')
@section('content')
    <form action="{{route('user.update', $user['id'])}}" method="POST" class="card p-5" style="margin-top: 20px;">
        @if($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif

        @if(Session::get('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}" autocomplete="off">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" value="{{$user['email']}}" autocomplete="off">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe pengguna : </label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    <option  value="admin" {{$user['role'] == 'admin' ? 'selected' :  ''}}>Admin</option>
                    <option  value="kasir" {{$user['role'] == 'kasir' ? 'selected' :  ''}}>Kasir</option>
                </select>
            </div>
        </div>

         <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Ubah password :</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}" autocomplete="off">
            </div>
        </div>

        <div class="d-grid gap-2" style="margin-top: 50px;">
            <button class="btn btn-primary" type="submit">Simpan perubahan</button>
          </div>
    </form>
@endsection