@extends('layouts.template')

@section('content')
<form action="{{route('medicine.store')}}" class="card bg-light border-primary mt-3 p-5" method="POST">
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif --}}
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label" @error('name')@enderror>Nama Obat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{old('name') }}">
      @error('name')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label" @error('type')@enderror>type Obat</label>
    <div class="col-sm-10">
      <select name="type" id="type" class="form-control">
        <option selected disabled hidden>--Pilih Type--</option>
        <option value="tablet" {{old('type') == 'tablet' ? 'selected' : ''}}>Tablet</option>
        <option value="sirup" {{old('type') == 'sirup' ? 'selected' : ''}}>sirup</option>
        <option value="kapsul" {{old('type') == 'kapsul' ? 'selected' : ''}}>kapsul</option>
      </select>
      @error('type')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label" @error('price')@enderror>harga Obat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" value="{{old('price') }}">
      @error('price')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label" @error('stock')@enderror>stock awal</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="stock" name="stock" value="{{old('stock') }}">
          @error('stock')
          <div class="text-danger">{{ $message }}</div>
      @enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary">kirim data</button>
        
</form>
@endsection