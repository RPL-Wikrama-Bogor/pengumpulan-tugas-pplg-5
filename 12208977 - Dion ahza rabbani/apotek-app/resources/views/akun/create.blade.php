@extends('layouts.template')


@section('content')
 <form action="" method="POST">
        
    {{--token syarat kirim data(agar sistem membaca bahwa data ini berasal dari sumber yang sah)--}}
    @csrf
<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Nama </label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" name="name" >
    </div>
  </div>
  <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="text"  class="form-control" id="email" name="email" >
    </div>
  </div>
  <div class="mb-3 row">
    <label for="role" class="col-sm-2 col-form-label">role</label>
    <div class="col-sm-10">
        <input type="text"  class="form-control" id="role" name="role" >
    </div>
  </div>
  <div class="mb-3 row">
    <label for="pass" class="col sm-2 col form-label">password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">kirim data</button>
</form>
@endsection