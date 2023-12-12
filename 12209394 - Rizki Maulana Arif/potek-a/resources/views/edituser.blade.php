<x-app-layout>
    
    <style>
        .mt-5{
            padding:5%; 
        }
    </style>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
@section('content')
<form action="user/update/{{$usr->id}}"class="mt-3 p-5" method="POST">
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
        <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama:</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="name" name="name" value="{{$usr->name}}">
          @error('name')
          <div class="text-danger">{{$message}}</div>
              
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label ">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="{{$usr->email}}" >
          @error('email')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
        <div class="col-sm-10">
           
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>{{$usr->role}}</option>
                <option value="admin" {{ old('role') =='admin' ? 'selected' : ''}}>admin</option>
                <option value="kasir" {{ old('role') =='kasir' ? 'selected' : ''}}>kasir</option>
            </select>
            @error('role')
            <div class="text-danger">{{$message}}</div>
                
            @enderror
        </div>
      </div>
      <div class="mb-3 row">
        {{-- for id name isinya sama kaya nama column di migrations --}}
        <label for="password" class="col-sm-2 col-form-label @error('password') is-invalid @enderror">Password:</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="password" name="password" value="xxxxxxxxxxxxxxxxxxxx">
    <br>
    <button type="submit" class="btn btn-primary">Simpan Perubahan </button>
</form>
</x-app-layout>

