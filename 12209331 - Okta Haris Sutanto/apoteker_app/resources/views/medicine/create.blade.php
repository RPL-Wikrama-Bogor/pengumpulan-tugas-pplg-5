@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.store') }}" method="post" class="mt-4">
    
    {{-- kirim data ke dalam database --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>    
    @endif
    {{-- kalau kedeteksi ada with session namanya 'succes' pas masuk kehalaman ini, msg nya akan di munculkan ke halaman ini--}}
    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Obat :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Type Obat :</label>
        <div class="col-sm-10">
            <select name="type" id="type" class="form-control">
                <option selected hidden disabled>Pilih Type Obat</option>
                <option value="tablet {{ old('type') == 'tablet' ? 'selected' :  ''}}">Tablet</option>
                <option value="sirup {{ old('type') == 'sirup' ? 'selected' :  ''}}">Sirup</option>
                <option value="kapsul {{ old('type') == 'kapsul' ? 'selected' :  ''}}">Kapsul</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
        <div class="col-sm-10">
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stok Awal :</label>
        <div class="col-sm-10">
            <input type="number" name="stock" id="stock" class="form-control">
        </div>
    </div>
    <button class="btn btn-primary" type="submit">Button</button>
</form>
@endsection