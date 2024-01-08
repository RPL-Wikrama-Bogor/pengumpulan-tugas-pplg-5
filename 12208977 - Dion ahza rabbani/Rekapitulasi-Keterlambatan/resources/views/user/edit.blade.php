@extends('layouts.template')

@section('content')
    <h1>Halaman Edit akun</h1>
    @foreach ($datauser as $item)
    <form action="{{ route('user.update',$item['id']) }}" method="POST">
        @endforeach
        {{ csrf_field() }}
        @method('PATCH')

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role">
                <option value="admin">Admin</option>
                <option value="ps">PS</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $item->email }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Name</label>
            <input type="text" class="form-control" id="password" name="password" value="{{ $item->password }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
