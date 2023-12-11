@extends('layouts.template')

@section('content')
    <form action="{{ route('user.update', $users['id']) }}" class="card mt-3 p-5" method="post">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
        @csrf
        {{-- menimpa nilai dri attr method di form, agar sama kaya yang di routenya --}}
        @method('PATCH')
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
            <label for="name" class="col-sm-2 col-form-label">Nama User :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                    value="{{ $users['name'] }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" autocomplete="off"
                    value="{{ $users['email'] }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
            <label for="role" class="col-sm-2 col-form-label">Role :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="role" name="role" autocomplete="off" disabled
                    value="{{ $users['role'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            {{-- for, id, name isinya sama kayak nama column di migrationnya --}}
            <label for="password" class="col-sm-2 col-form-label">Password :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" autocomplete="off">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection
