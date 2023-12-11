@extends('layouts.template')

@section('content')
<form action="{{route('medicine.update', $medicine['id'])}}" class="card bg-light mt-3 p-5" method="POST">
    {{--untuk menampilakan eror nya di atas --}}
    {{-- @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif --}}
    {{-- kalau kedeteksi ada with session namanya 'success' pas masuk ke halaman ini, msg yang bakal muncul disini--}}
    
    {{-- token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah ) --}}
    @csrf
    {{--menimpa nilai dari attr method di from , agar sama ka ayang di routenya --}}
    @method('PATCH')
    <div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label" @error('name')@enderror>Nama Obat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
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
        <option value="tablet" {{$medicine['type'] == 'tablet' ? 'selected' : ''}}>Tablet</option>
        <option value="sirup" {{$medicine['type'] == 'sirup' ? 'selected' : ''}}>sirup</option>
        <option value="kapsul" {{$medicine['type'] == 'kapsul' ? 'selected' : ''}}>kapsul</option>
      </select>
      @error('type')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label" @error('price')@enderror>harga Obat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" value="{{$medicine['price'] }}">
      @error('price')
          <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>
    </div>

        <button type="submit" class="btn btn-primary">kirim data</button>
        
</form>

@endsection

