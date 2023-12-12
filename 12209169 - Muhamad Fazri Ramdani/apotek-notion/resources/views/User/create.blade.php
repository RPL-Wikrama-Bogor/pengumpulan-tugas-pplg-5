@extends('layouts.template')

@section('content')
<form action="{{ route('user.store') }}"class="mt-3 p-5" method="POST">
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

  <div class="mb-3 row">
    {{-- for id name isinya sama kaya nama column di migrations --}}
    <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama:</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}">
      @error('name')
      <div class="text-danger">{{$message}}</div>
          
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label ">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="{{ old('name') }}" >
      @error('email')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
    <div class="col-sm-10">
       
        <select name="role" id="role" class="form-control">
            <option selected hidden disabled>Pilih</option>
            <option value="admin" {{ old('role') =='admin' ? 'selected' : ''}}>Admin</option>
            <option value="kasir" {{ old('role') =='kasir' ? 'selected' : ''}}>Kasir</option>
        </select>
        @error('role')
        <div class="text-danger">{{$message}}</div>
            
        @enderror
    </div>
  </div>
  

    <button type="submit" class="btn btn-primary">kirim data </button>
</form>
@endsection