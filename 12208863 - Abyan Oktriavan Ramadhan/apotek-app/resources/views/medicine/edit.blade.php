@extends('layouts.template')

@section('content')
    <br>
    <form action="{{ route('medicine.update', $medicine['id']) }}" method="POST" class="card mt-3 p-5">
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
      {{-- menyimpan nilai dari attr method di form agar sama kaya yang di rountenya --}}
      @method('PATCH')
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Obat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">type Obat</label>
            <div class="col-sm-10">
              <select class="form-control" id="type" name="type">
                <option hidden disabled>Pilih</option>
                <option value="tablet" {{ $medicine['tablet'] == 'tablet' ? 'selected' : '' }}>tablet</option>
                <option value="sirup" {{ $medicine['sirup'] == 'sirup' ? 'selected' : '' }}>sirup</option>
                <option value="capsul" {{ $medicine['capsul'] == 'capsul' ? 'selected' : '' }}>kapsul</option>
              </select>
            </div>
          </div>
          <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
@endsection