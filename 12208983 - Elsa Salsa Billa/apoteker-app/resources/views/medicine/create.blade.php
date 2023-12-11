@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.store') }}" class="card mt-3 p-5" method="POST">
    {{-- kalau ada error validasi, akan ditampilkan disini--}}
    {{-- @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
    {{-- kalau kedetksi ada sith session namanya 'success' pas masuk ke hal ini, msg nya bakal dimunculin disini--}}
    @if (Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
    @csrf
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama Obat :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label @error('type') is-invalid @enderror">Type Obat :</label>
        <div class="col-sm-10">
          <select name="type" id="type" class="form-control">
            <option selected hidden disabled>Pilih</option>
            <option value="tablet" {{ old('type') == 'tablet' ? 'selected' : '' }}>tablet</option>
            <option value="sirup" {{ old('type') == 'sirup' ? 'selected' : '' }}>sirup</option>
            <option value="kapsul" {{ old('type') == 'kapsul' ? 'selected' : '' }}>kapsul</option>
          </select>
          @error('type')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label @error('price') is-invalid @enderror">Harga Obat :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
          @error('price')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label @error('stock') is-invalid @enderror">Stock Awal :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
          @error('stock')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Kirim Data</button>
</form>
@endsection