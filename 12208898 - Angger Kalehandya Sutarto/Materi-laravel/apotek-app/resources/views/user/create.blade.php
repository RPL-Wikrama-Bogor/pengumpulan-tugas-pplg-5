@extends('layouts.template')

@section('content')
<form action="{{ route('user.store') }}" class="card mt-3 p-5" method="post">
    {{-- kalau ada erorr validasi, akan ditampilkan disini --}}
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
    @csrf
    <div class="mb-3 row">
        {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="{{ old('email') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Type Pengguna :</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih Type Pengguna</option>
                <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="kasir" {{ old('type') == 'kasir' ? 'selected' : '' }}>Kasir</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Data</button>
</form>
@endsection