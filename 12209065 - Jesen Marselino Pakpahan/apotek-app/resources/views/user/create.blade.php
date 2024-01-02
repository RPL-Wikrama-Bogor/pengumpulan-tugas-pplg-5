@extends('layouts.template')

@section('content') 
    <form action="{{ route('medicine.store')}}" class="card mt-3 p-5" method="POST">
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
        {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}

        @csrf


    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select type="type" name="type" class="form-control" id="type">
                <option selected hidden disabled>pilih</option>
                <option value="admin">admin</option>
                <option value="kasir">kasir</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">kirim data</button>
</form>
@endsection