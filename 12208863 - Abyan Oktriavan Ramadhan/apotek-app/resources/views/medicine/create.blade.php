@extends('layouts.template')

@section('content')
    <br>
    <form action="{{ route('medicine.store') }}" method="POST" class="card mt-3 p-5">
      {{-- kalau ada error validasi, akan di tampilkan disini --}}
      @if ($errors->any())
          <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
      @endif
          {{-- kalau kedeteksi ada with seession namanya  --}}
      @if (Session::get('success'))
          <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
      {{-- token syarat kirim data (agar sistem membaca bahawa data ini berasal dari sumber yang sah) wajib buat kirim data ke database --}}
      @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label @error('name') is-innvalid @enderror">Nama Obat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                  <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">type Obat</label>
            <div class="col-sm-10">
              <select class="form-control" id="type" name="type">
                <option selected hidden disabled>Pilih</option>
                <option value="tablet" {{ old('type') == 'tablet' ? 'selected' : '' }}>tablet</option>
                <option value="sirup" {{ old('type') == 'sirup' ? 'selected' : '' }}>sirup</option>
                <option value="capsul" {{ old('type') == 'capsul' ? 'selected' : '' }}>kapsul</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="stock" class="col-sm-2 col-form-label">stok awal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection