@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Tambah Data Rombel</h1>
    <p>Home | Data Master | Data Rombel | <span style="font-weight: bold">Tambah Data Rombel</p>
</div>
    <form action="{{ route('rombel.store') }}" method="post" class="card mt-5 p-5 ml-[300px]">
         @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
        @csrf
        {{-- Display validation errors --}}
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="rombel" class="col-sm-2 col-form-label">Rombel :</label>
            <div class="col-sm-10">
                <input type="text" name="rombel" id="rombel" class="form-control">
            </div>
        </div>
        <button class="btn btn-primary bg-blue-700" type="submit">Tambah data</button>
    </form>
    <br>
@endsection