@extends('layouts.template')

@section('content')
<form action="{{ route('user.store') }}" method="post" class="mt-4">
    
    {{-- Kirim data ke dalam database --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    
    {{-- Jika ada session variabel 'success', tampilkan pesan di halaman ini --}}
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email"> 
        </div>
    </div>
    
    <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Peran Pengguna :</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' :  '' }}>Admin</option>
                <option value="kasir" {{ old('role') == 'kasir' ? 'selected' :  '' }}>Kasir</option>
            </select>
        </div>
    </div>
    
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@endsection