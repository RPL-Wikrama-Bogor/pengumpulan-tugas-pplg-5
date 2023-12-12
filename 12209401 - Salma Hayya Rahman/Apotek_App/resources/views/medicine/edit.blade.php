@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.update' , $medicine['id']) }}" class="card mt-5 p-5" method="POST">
    @csrf

    {{-- menimpa nilai dr attr method di form, agar sama kaya yang di routenya --}}
    @method('PATCH')
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label ">Nama : </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
      @error('name')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label">Email : </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
      @error('price')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label ">Tipe Pengguna</label>
    <div class="col-sm-10">
      <select name="type" id="type" class="form-control">
        <option selected hidden disabled>Pilih</option>
        <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}>Admin</option>
        <option value="sirup" {{ $medicine['type'] == 'sirup' ? 'selected' : '' }}>Kasir</option>
      </select>
      @error('type')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label">Ubah Password : </label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
      @error('price')
      <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    </div>
<button type="submit" class="btn btn-primary">Update Data</button>
</form>
@endsection