@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Edit Data Rombel</h1>
    <p>Home | Data Master | <span style="font-weight: bold">Edit Data Rombel</span></p>
</div>
<form action="{{route('rombel.update', $rombels['id'])}}" class="card bg-light mt-3 p-5 ml-[300px]" method="POST">
     @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
    @csrf
    @method('PATCH')
<div class="mb-3 row">
    <label for="rombel" class="col-sm-2 col-form-label" @error('rombel')@enderror>Rombel: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="rombel" name="rombel" value="{{ $rombels['rombel'] }}">
      @error('name')
          <div class="text-danger">{{ $message}}</div>
      @enderror
    </div>
  </div>
  <button type="submit" class="btn btn-primary bg-blue-700">Edit data</button>
</div>     
</form>
@endsection