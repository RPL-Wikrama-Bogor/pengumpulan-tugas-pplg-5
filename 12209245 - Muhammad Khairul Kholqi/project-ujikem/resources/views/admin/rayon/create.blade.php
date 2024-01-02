@extends('layouts.template')

@section('content')
<div class="title-user ml-[300px] mt-[50px]">
    <h1 class="text-[50px] font-bold">Tambah Data Rayon</h1>
    <p>Home | Data Master | Data Rayon | <span style="font-weight: bold">Tambah Data Rayon</span></p>
</div>
    <form action="{{ route('rayon.store') }}" method="post" class="card mt-5 p-5 ml-[300px]">
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
      @endif
        @csrf
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="rayon" class="col-sm-2 col-form-label">Rayon :</label>
            <div class="col-sm-10">
                <input type="text" name="rayon" id="rayon" class="form-control">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="user_id" class="col-sm-2 col-form-label">Pembimbing Rayon:</label>
            <div class="col-sm-10">
                <select name="user_id" id="user_id" class="form-control">
                    <option selected disabled>Pilih</option>
                    <option>PS WIkrama 1</option>
                    <option>PS Cicurug 5</option>
                    <option>PS Tajur 3</option>
                    <option>PS Ciawi 4</option>
                    <option>PS Cibedug 2</option>
                </select>
            </div>
        </div>

        <button class="btn btn-primary bg-blue-700" type="submit">Tambah data</button>
    </form>
    <br>
@endsection