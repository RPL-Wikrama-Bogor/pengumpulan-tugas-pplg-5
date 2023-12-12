<x-app-layout>
    <style>
     .bak{
        width: 1000px;
        margin-left:15%; 
        background: #fff;
        padding: 4%;
        border-radius: 30px;
     }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl dark:text-gray-200 leading-tight" style="margin-left:43% ">
            {{ __('edit Obat') }}
        </h2>
    </x-slot><br><br><br>
<form action="update/{{ $data['id'] }}"class="mt-3 p-5" method="POST">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
<div class="bak">
  <div class="mb-3 row">
    {{-- for id name isinya sama kaya nama column di migrations --}}
    <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama Obat</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" name="nama_obat" value="{{ $data['nama_obat'] }}">
      @error('name')
      <div class="text-danger">{{$message}}</div>
          
      @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="type" class="col-sm-2 col-form-label">Type obat</label>
    <div class="col-sm-10">
       
        <select name="tipe" id="type" class="form-control">
            <option selected hidden disabled>{{$data['tipe']}}</option>
            <option value="tablet" {{ $data ['tipe'] =='tablet' ? 'selected' : ''}}>tablet</option>
            <option value="kapsul"{{ $data ['tipe'] =='kapsul' ? 'selected' : ''}}>kapsul</option>
            <option value="syrup"{{ $data ['tipe'] =='syrup' ? 'selected' : ''}}>syrup</option>
        </select>
        @error('type')
        <div class="text-danger">{{$message}}</div>
            
        @enderror
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col-sm-2 col-form-label ">Harga Obat :</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="price" name="harga" value="{{ $data['harga'] }}" >
      @error('price')
      <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
  </div>

    
    <button type="submit" class="btn btn-primary">kirim data </button>
</form>
</div>
</x-app-layout>
