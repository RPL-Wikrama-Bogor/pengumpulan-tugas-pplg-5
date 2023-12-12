@extends('layouts.template')

@section('content')
<form action="{{ route('medicine.update', $medicine['id'])}}" class="card mt-5 p-5 border-primary" method="POST">
    {{-- kalau ada error validasi, akan ditampilkan disini --}}
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    {{-- kalau kedeteksi ada with session namanya 'succes' pas masuk kehalaman ini, msg nya bakal dimunculkan disnini --}}
    @if(Session::get('success'))
         <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    {{--token syarat kirim data (agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}
    @csrf
    {{-- menimpa nilai dari attr method di form, agar sama kaya yang di routenya --}}
    @method('PATCH')
    <div class="mb-3 row">
        {{--for, id, name isinya sama kaya nama column di migration--}}
        <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama Obat :</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{$medicine['name']}}">
          @error('name')
            <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label @error('type') is-invalid @enderror">Tipe Obat : </label>
        <div class="col-sm-10">
            <select name="type" id="type" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="tablet" {{$medicine['type'] == 'tablet' ? 'selected' :  ''}}>Tablet</option>
                <option value="sirup" {{$medicine['type'] == 'sirup' ? 'selected' :  ''}}>Sirup</option>
                <option value="kapsul" {{$medicine['type'] == 'kapsul' ? 'selected' :  ''}}>Kapsul</option>
            </select>
            @error('type')
            <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label @error('price') is-invalid @enderror">Harga Obat :</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price" value="{{$medicine['price']}}">
          @error('price')
            <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Kirim Data</button>
      </div>
</form>
@endsection