@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.store') }}" class="card mt-3 p-5" method="POST">
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {{--kalai kedeteksi ada with session namanya 'siccess' pas masuk ke halaman ini, msg nya bakal simunculin disini--}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    {{--token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Obat : </label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
        @error('name')
            <div class="text-danger">{{ message }}</div>
        @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Tipe Obat : </label>
        <div class="col-sm-10">
            <select name="type" id="type" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="tablet" {{ old('type') == 'tablet' ? 'selected' : '' }}>tablet</option>
                <option value="sirup" {{ old('type') == 'sirup' ? 'selected' : '' }}>sirup</option>
                <option value="kapsul" {{ old('type') == 'kapsul' ? 'selected' : '' }}>kapsul</option>
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Obat : </label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stock awal : </label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="stock" name="stock" value="{{ old('price') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Kirim Data</button>
</form>
@endsection