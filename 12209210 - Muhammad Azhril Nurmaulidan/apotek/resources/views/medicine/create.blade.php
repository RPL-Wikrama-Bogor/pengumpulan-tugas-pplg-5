@extends('layouts.template')


@section('content')
 <form action="{{ route('medicine.store')}}" class="card mt-3 p-5"method="post">
    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $eror)
        <li>{{$eror}}</li>
        @endforeach
    </ul>
    @endif

    @if(Session::get('succes'))
        <div class="alert alert-succes">{{Session::get('succes')}}</div>
        @endif
        
    {{--token syarat kirim data(agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}
    @csrf
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">nama obat</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" name="name" >
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">type obat</label>
    <div class="col-sm-10">
      <select name="type" type="type" class="form-control" id="type">
        <option selected hidden disabled>pilih</option>
        <option value="tablet">tablet</option>
        <option value="sirup">sirup</option>
        <option value="kapsul">Kapsul</option>
      </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="price" class="col sm-2 col form-label">harga obat</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" id="price" name="price">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="stock" class="col sm-2 col form-label">stock awal</label>
    <div class="col-sm-10">
        <input type="number" name="stock" id="stock" class="form-control">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">kirim data</button>
</form>
@endsection