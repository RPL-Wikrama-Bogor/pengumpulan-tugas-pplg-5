@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.update', $medicine['id']) }}" class="card mt-3 p-5" method="POST">
    
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah) --}}
    @csrf
    {{-- menimpa nilai dari attr method diform, agar sama kaya yg diroutenya --}}
    @method('PATCH')
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Obat :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
          @error('name')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Type Obat :</label>
        <div class="col-sm-10">
          <select name="type" id="type" class="form-control">
            <option selected hidden disabled>Pilih</option>
            <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}>tablet</option>
            <option value="sirup" {{ $medicine['type'] == 'sirup' ? 'selected' : '' }}>sirup</option>
            <option value="kapsul" {{ $medicine['type'] == 'kapsul' ? 'selected' : '' }}>kapsul</option>
          </select>
          @error('type')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga Obat :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
          @error('price')
          <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Kirim Data</button>
</form>
@endsection