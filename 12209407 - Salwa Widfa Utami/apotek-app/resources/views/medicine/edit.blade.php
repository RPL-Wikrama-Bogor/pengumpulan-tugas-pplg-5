@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.update',$medicine['id']) }}"class="mt-3 p-5" method="POST">
    {{-- kalau error validasinya akan ditampilkan disini --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
        
    @endif

{{-- kalau ke detec ada with session namanya "success" pas masuk ke halaman ini ,msg nya bakal dimunculin --}}
 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>
     
 @endif

    {{-- token syarat kirim data(agar sistem membaca bahwa data ini berasal daari sumber yang sah) --}}
    @csrf
    {{-- MENIMPA NILAI DARI attr method di form ,agar semua --}}
    @method('PATCH')

  <div class="mb-3 row">
    {{-- for id name isinya sama kaya nama column di migrations --}}
    <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama Obat</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
      @error('name')
      <div class="text-danger">{{$message}}</div>
          
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label">Type obat</label>
    <div class="col-sm-10">
       
        <select name="type" id="type" class="form-control">
            <option selected hidden disabled>Pilih</option>
            <option value="tablet" {{ $medicine ['type'] =='tablet' ? 'selected' : ''}}>tablet</option>
            <option value="sirup" {{ $medicine ['type'] =='sirup' ? 'selected' : ''}}>sirup</option>
            <option value="kapsul"{{ $medicine ['type'] =='kapsul' ? 'selected' : ''}}>kapsul</option>
        </select>
        @error('type')
        <div class="text-danger">{{$message}}</div>
            
        @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label ">Harga Obat :</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="price" value="{{ $medicine['price'] }}" >
      @error('price')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
  </div>

    
    <button type="submit" class="btn btn-primary">kirim data </button>
</form>
@endsection