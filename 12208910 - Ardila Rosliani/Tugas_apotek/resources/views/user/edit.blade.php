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
        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
        @csrf
        {{-- menimpa nilai dr attr method di form, agar saka kaya yang ada di routenya--}}
        @method('PATCH')
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kaya nama column di migrationnya--}}
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kaya nama column di migrationnya--}}
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna :</label>
            <div class="col-sm-10">
                <select name="role" id="role" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    <option value="kasir" {{ $user['role'] == 'kasir' ? 'selected' : '' }}>Kasir</option>
                    <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password : </label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection